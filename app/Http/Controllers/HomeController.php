<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(empty(session('user')))
            return redirect(route('login'));
        $user=(object)session('user');
        $func=new FunctionController();
       // $uc=$func->getData('select',['Id' => $user->exam[0]->Id],'chkUser',1,0,2)->first()['userC']??0;
         $uR = $func->getData('select',['Id' => $user->Id],'UserLastExam',1)->first();
         if($uR)
        $func->getData('update',['Id' => $uR['Id']],'UserLastExamSeen',1)->first();

        return view('dashboard',compact('user','uR'));
    }
    public function login(Request $req)
    {
        $req->validate([
                'Phone' => ['required', 'digits_between:5,18'],
                'password' => ['required']
            ],[
                'password.required'=>'وارد کردن گذرواژه الزامی است',
                'password.numbers'=>'گذرواژه بصورت صحیح وارد نشده است',
                'Phone.required'=>'وارد کردن شماره همراه الزامی است',
                'Phone.exists'=>'حساب کاربری با این شماره یافت نشد',
                'Phone.digits_between'=>'لطفا شماره همراه خود را به صورت دقیق و به شکل 09111111111 وارد کنید'
            ]);
             $data = $req->only('Phone', 'password');
            $remember = (bool) $req->input('remember');
            $func=new FunctionController();
           $user=$func->getData('select',$data,'Login',1)->first();
        if ($user) {
           $user['exams']=$func->getData('select',['Id'=>$user['Id']],'UserExams',1);
           session(['user'=>$user]);
            $req->session()->regenerate();
            return redirect()->intended(route('index'));
        }

        return back()->withErrors([
            'Phone' =>'اطلاعات وارد شده صحیح نمی باشد',
        ])->withInput($req->except('password'));
    }
    public function home(Request $request, string $slug)
    {
        
        $func=new FunctionController();
        $url = $func->getData('select',['Slug'=>$slug],'MyUrl',1)->first();
        if(!$url)
        abort(404);
        $exam = $func->getData('select',['Id'=>$url['ExamId']],'Exam',1)->first();
        if(!$exam)
        abort(404);

        Cache::put(config('quiz.cache_prefix') . $request->ip(), [
            'current_step' => 0,
            'supporter_id' => $url['Support_Id'],
            'exam_id' => $url['ExamId'],
            'exam_name' => $exam['Name'],
            'exam_des' => $exam['Description'],
            'exam_msg' => $exam['Message'],
            'user' => $url['UserId']??null,
            'url' => $url['Id']??null
        ], now()->addMinutes(config('quiz.cache_minutes')));

        return view('home', compact('url','exam'));
    }
}
