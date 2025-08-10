<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInfoRequest;
use App\Models\Answer;
use App\Models\Pattern;
use App\Models\Question;
use App\Models\Result;
use App\Models\Supporter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class SurveyController extends Controller
{
    public function start(Request $request, Supporter $supporter)
    {
		$cachedData = Cache::get(config('quiz.cache_prefix') . $request->ip());
        $eid = $cachedData['exam_id'] ?? 1;
        $func=new FunctionController();
        $questions = $func->getData('select',['where'=>' where ExamId='.$eid],'AllQuiz',1);
        $infoData = Question::$infoData;
        return view('survey', compact('questions', 'infoData', 'supporter','eid'));
    }

    public function storeInfo(StoreInfoRequest $request)
    { 
        
        // get previous data:
        $cachedData = Cache::get(config('quiz.cache_prefix') . $request->ip());
        $quizData = $cachedData['data'] ?? [];

        // put new data:
        $quizData[$request->step] = [
            'category' => $request->category,
            'id' => $request->quiz,
            'name' => $request->name,
            'value' => $request->value,
        ];

        // save data:
        Cache::put(config('quiz.cache_prefix') . $request->ip(), [
            'current_step' => $request->step,
            'supporter_id' => $cachedData['supporter_id'],
            'exam_id' => $cachedData['exam_id'],
            'exam_name' => $cachedData['exam_name'],
            'exam_des' => $cachedData['exam_des'],
            'exam_msg' => $cachedData['exam_msg'],
            'data' => $quizData
        ], now()->addMinutes(config('quiz.cache_minutes')));

        // store data if it's last step
        if (count(Cache::get(config('quiz.cache_prefix') . $request->ip())['data']) ==$request->qcount ) {
            return $this->storeSurvey($request);
        }


        // return response
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function storeSurvey(Request $request)
    {
        $func=new FunctionController();
        try {

            // get cached data
            $cachedData = Cache::get(config('quiz.cache_prefix') . $request->ip());
            $cachedQuestions = $cachedData['data'];

            // split user data and survey data
            $infoData = Arr::where($cachedQuestions, function ($value) {
                return $value['category'] == 'info';
            });
            $quizData = Arr::where($cachedQuestions, function ($value) {
                return $value['category'] == 'survey';
            });

            $userData = [
                'Name' => Arr::first($infoData, function ($value) {
                    return $value['name'] == 'name';
                })['value'],
                'Phone' => Arr::first($infoData, function ($value) {
                    return $value['name'] == 'phone';
                })['value'],
                'City' => Arr::first($infoData, function ($value) {
                    return $value['name'] == 'city';
                })['value'],
                'Age' => Arr::first($infoData, function ($value) {
                    return $value['name'] == 'age';
                })['value'],
                'Support_Id' => $cachedData['supporter_id'],
                'ExamId' => $cachedData['exam_id']
            ];

            // create user
            $user =  $func->getData('insertGetId',$userData,'NewUser',1);

			$eid = $cachedData['exam_id'] ?? 1;
                // execute patterns
                $patterns = $func->getData('select',['where'=>' where ExamId='.$eid],'Pattern',1);

                $patternStrings = collect();
                $patternFiles = collect();
                    
                if($eid!=2)
                {
                foreach ($patterns as $pattern) {                
                    $patterns_of_and = json_decode($pattern['Pattern'], true)['And'];
                    $patterns_of_not = json_decode($pattern['Pattern'], true)['Not'] ?? [];
                    $flag = true;
                    foreach ($patterns_of_and as $patternRule) {
                        $answer = Arr::first($quizData, function ($value) use ($patternRule) {
                            return $value['name'] == $patternRule['Question_Number'];
                        });
                        if ($answer['value'] != $patternRule['Answer']) {
                            $flag = false;
                            break;
                        }
                    }
                    foreach ($patterns_of_not as $patternNotRule) {
                        $answer = Arr::first($quizData, function ($value) use ($patternNotRule) {
                            return $value['name'] == $patternNotRule['Question_Number'];
                        });
                        if ($answer['value'] == $patternNotRule['Answer']) {
                            $flag = false;
                            break;
                        }
                    }
                    if ($flag) {
                        $patternStrings->push($pattern['Text']);
                    }
                }
                    
                }
                else
                {
                    foreach ($patterns as $pattern) {  
                        $patterns_of_and = json_decode($pattern['Pattern'], true)['And'] ?? [];
                        $patterns_of_not = json_decode($pattern['Pattern'], true)['Not'] ?? [];
                        $patterns_of_or = json_decode($pattern['Pattern'], true)['Or'] ?? [];
                        $flag = true;
    
                        // بررسی شرایط AND
                        foreach ($patterns_of_and as $patternRule) {
                            $answer = Arr::first($quizData, function ($value) use ($patternRule) {
                                return $value['name'] == $patternRule['Question_Number'];
                            });
                            if ($answer['value'] != $patternRule['Answer']) {
                                $flag = false;
                                break;
                            }
                        }
    $notMatched = false;
                        // بررسی شرایط NOT
                        foreach ($patterns_of_not as $patternNotRule) {
                            $answer = Arr::first($quizData, function ($value) use ($patternNotRule) {
                                return $value['name'] == $patternNotRule['Question_Number'];
                            });
                            if ($answer['value'] == $patternNotRule['Answer']) {
                                $notMatched = true;
                                break;
                            }
                        }
    
                        // بررسی شرایط OR
                        $orMatched = false; // برای بررسی اینکه آیا حداقل یک شرط OR درست است
                        foreach ($patterns_of_or as $patternRule) {
                            $answer = Arr::first($quizData, function ($value) use ($patternRule) {
                                return $value['name'] == $patternRule['Question_Number'] && $value['value'] == $patternRule['Answer'];
                            });
                            if ($answer) {
                                $orMatched = true; // حداقل یک شرط OR درست است
                                break; // نیازی به ادامه بررسی نیست
                            }
                        }
    
                        // اگر شرایط AND درست بود و شرایط NOT نادرست بود و حداقل یک شرط OR درست بود
                        if ($flag && !$notMatched && $orMatched) {
                            if($pattern['File'])
                            $patternFiles->push($pattern['File']);    
                            //else
                            $patternStrings->push($pattern['Text']);
                        }
                    }
                }
            
                

                $patternStrings = $patternStrings->unique();
                $patternFiles = $patternFiles->unique();
                $patternFiles = $patternFiles->sort();

                $resultData = [
                    'User_Id' => $user[0],
                    'Date' => now(),
                    'result' => implode(' ', $patternStrings->all()),
                    'files' => json_encode( $patternFiles->all())
                ];
                
            $func->getData('insert',$resultData,'NewResult',1);
            
            

            // prepare survey answers for saving
            $storingSurvey = [];
            $index = 0;
            foreach ($quizData as $response) {
                $storingSurvey[$index]['Question_Id'] = $response['id'];
                $storingSurvey[$index]['Answer'] = $response['value'];
                $storingSurvey[$index]['User_Id'] = $user[0];
                $index++;
            }

            $func->getData('insert',$storingSurvey,'NewAnswer',1);

            return response()->json([
                'redirect' => route('survey.finish', $user[0])]);

        } catch (\Exception $exception) {

            if (isset($user)) {
                 $func->getData('select',['Id'=>$user[0]],'DeleteUser',1);
                 $func->getData('select',['User_Id'=>$user[0]],'DeleteAnswer',1);
                 $func->getData('select',['User_Id'=>$user[0]],'DeleteResult',1);
            }

            return response()->json([
                'message' => 'خطایی در ارتباط با سرور راخ داد!',
                'err'=>$exception
            ], 500);
        }
    }

    public function finish(Request $request, $user)
    {		
	    $cachedData = Cache::get(config('quiz.cache_prefix') . $request->ip());
        $exam=['name'=>$cachedData['exam_name'],'des'=>$cachedData['exam_des'],'msg'=>$cachedData['exam_msg']];
        // delete cached data
        $func=new FunctionController();
        $uc = $func->getData('select',['Id' => $user],'chkUser',1,0,$cachedData['exam_id'] ?? 1)->first()['userC']??0;
       
        if(!$uc)
        abort(404);
        $uR=0;
        
           // $uR = $func->getData('select',['Id' => $user],'UserResult',1,0,$cachedData['exam_id'] ?? 1)->first();
         Cache::forget(config('quiz.cache_prefix') . $request->ip());
        return view('finish',compact('exam','uR'));
    }
}
