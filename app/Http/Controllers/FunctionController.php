<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Collection;

class FunctionController extends Controller
{
    private $api_token;
    public function __construct()
    {
        $this->api_token=env('API_TOKEN');
        
    }
    public function getData($type,$param,$function,$sName=null,$all=0,$eid=1)
    {
        if($type=="update")
        $url="http://185.116.161.39/RokhAPI/updateApi_jwt.php";
        elseif($type=="insertGetId")
        $url="http://185.116.161.39/RokhAPI/insertGetIdApi_jwt.php";
        elseif($type=="updateinsert")
        $url="http://185.116.161.39/RokhAPI/updateOrInserApi_jwt.php";
        elseif($type=="insertselect")
        $url="http://185.116.161.39/RokhAPI/InsertSelectApi_jwt.php";
        else
        $url="http://185.116.161.39/RokhAPI/selectApi_jwt.php";
              

        switch ($function) {
            case 'Exam':
                $select="select  * from Quiz_ExamTbl as e  where e.Id='".$param['Id']."'";
                $update="";
                break;
            case 'MyUrl':
                $select="select  * from Quiz_UrlTbl as q  where q.Expire_Date > GETDATE() and q.Slug='".$param['Slug']."'";
                $update="";
                break;
            case 'chkUser':
                $select="select  count(*) userC from Quiz_UserTbl  where ExamId=$eid and ".key($param)."='".reset($param)."'";
                $update="";
                break;
            case 'AllQuiz':
                $select="select * from Quiz_QuestionTbl".($param['where']??'');
                $update="";
                break;
            case 'QuizCount':
                $select="select count(*) quc from Quiz_QuestionTbl".($param['where']??'');
                $update="";
                break;
            case 'Pattern':
                $select="select * from Quiz_PatternTbl".($param['where']??'');
                $update="";
                break;
            case 'UserResult':
                $select="select * from Quiz_ResultTbl where User_Id=".$param['Id'].($param['where']??'');
                $update="";
                break;
           case 'NewUser':
                    $select="INSERT INTO Quiz_UserTbl([Phone],[Name] ,[City],[Age] ,[Support_Id],[ExamId]) VALUES ('".$param['Phone']."', N'".$param['Name']."', N'".$param['City']."',".$param['Age'].",".$param['Support_Id'].",".$param['ExamId'].")";
                    $update="";
                    break;
           case 'DeleteUser':
                    $select="DELETE from Quiz_UserTbl where Id=".$param['Id'];
                    $update="";
                    break;
           case 'DeleteAnswer':
                    $select="DELETE from Quiz_AnswerTbl where User_Id=".$param['User_Id'];
                    $update="";
                    break;
           case 'DeleteResult':
                    $select="DELETE from Quiz_ResultTbl where User_Id=".$param['User_Id'];
                    $update="";
                    break;
           case 'NewResult':
                    $select="INSERT INTO Quiz_ResultTbl([User_Id],[Date] ,[result],[Files]) VALUES (".$param['User_Id'].",'".$param['Date']."',N'".$param['result']."',N'".$param['files']."')";
                    $update="";
                    break;
           case 'NewAnswer':
                    $select="INSERT INTO Quiz_AnswerTbl ([User_Id] ,[Question_Id] ,[Answer] ) VALUES";
                    foreach ($param as  $key=>$value)
                    {
                        $select.=" (".$value['User_Id'].",".$value['Question_Id'].", N'".$value['Answer']."')";
                        if($key<count($param)-1)
                        $select.=",";
                        else
                        $select.=";";
                    }
                    $update="";
                    break;
        }
        //if($function=='Reservation')dd($select,$update,$insert);
            $response = Http::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',           
                'api_token' => $this->api_token,
            ])->asForm()->post($url,['update' => $update,'data' => $select,'insert' => $insert??'']);
            
            if($sName)
            {
                if($all)
                return $response;

                if($response->ok())
                {
                    try {
                        //code...
                    
                    $data=$response->json();
                    if($data['status']==200)
                    $challs=Collection::make($data['data']); 
                    else
                    $challs=Collection::make([]); 
                } catch (\Throwable $th) {
                    $body = $response->body();
                    $body = preg_replace('/^\x{FEFF}/u', '', $body);
                    $data = json_decode($body, true);
                    try {
                        if($data['status']==200)
                        $challs=Collection::make($data['data']); 
                        else
                        $challs=Collection::make([]); 
                    } catch (\Throwable $th2) {
                        dd($type,$function,$select,$response->body(),$response->json(),$response->Json(),$th,$th2);
                    }

                    


                      
                    }
                    
                }
                else
                $challs=Collection::make([]); 
                if($sName!=1)
                session([$sName=>$challs]);
                else
                return $challs;
                 

            }
            return $response->ok();
    }
}
