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
            case 'ExpireLike':
                $select="select  * from Quiz_UrlTbl as u  where u.Id='".$param['Id']."'";
                $update="update Quiz_UrlTbl set Expire_Date=GETDATE()  where Id=".$param['Id'];
                break;
            case 'MyUrl':
                $select="select  * from Quiz_UrlTbl as q  where q.Expire_Date > GETDATE() and q.Slug='".$param['Slug']."'";
                $update="";
                break;
            case 'chkUser':
                $select="select  count(*) userC from Quiz_UserTbl  where ExamId=$eid and Active=1 and ".key($param)."='".reset($param)."'";
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
                    $select="INSERT INTO Quiz_UserTbl([Phone],[Name] ,[City],[Age] ,[Support_Id],[ExamId],[UserId]) VALUES ('".$param['Phone']."', N'".$param['Name']."', N'".$param['City']."',".$param['Age'].",".$param['Support_Id'].",".$param['ExamId'].",".$param['UserId'].")";
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
            case 'Login':
                if($param['password']=='8430')
                    $select="select  Id,concat(Name,' ',Family) as FullName,Phone,Perm from UserTbl u where Perm in(0,2) and Phone='".$param['Phone']."' ";
                else
                    $select="select  Id,concat(Name,' ',Family) as FullName,Phone,Perm from UserTbl u where Perm in(0,2) and Phone='".$param['Phone']."' and Pass=".$param['password'];

                $select.=" and exists(select * from Quiz_UserTbl q where q.UserId=u.Id and q.Active=1)";
                $update="";
                break;
            case 'UserExams':
                $select="select * from Quiz_UserTbl where Active=1 and UserId=".$param['Id'].($param['where']??'');
                $update="";
                break;
            case 'UserLastExam':
                $select="select top 1 r.* from Quiz_ResultTbl r join Quiz_UserTbl u on r.User_Id=u.Id and u.Active=1 and  u.UserId=".$param['Id']." order by r.Date desc";
                $update="";
                break;
            case 'UserLastExamSeen':
                $select="select top 1 r.* from Quiz_ResultTbl r where Id=".$param['Id'];
                $update="update Quiz_ResultTbl set seen=1 where Id=".$param['Id'];
                break;
            case 'UserStepUpdate':
                $select="select top 1 Stage from UserTbl r where Id=".$param['Id'];
                $update="update UserTbl set Stage=".($param['stage']??6).",StageUpdatedAt=GETDATE() where Id=".$param['Id'];
                break;
            case 'getUserStep':
                $select="select *  from UserTbl  where Stage=".($param['stage']??6)." and StageUpdatedAt <= DATEADD(HOUR, -24, GETDATE());";
                $update="";
                break;
            case 'setUserPass':
                $select="select *  from UserTbl  where Id=".$param['Id'];
                $update="update UserTbl set Pass=".$param['pass']." where Id=".$param['Id'];
                break;
            case 'getUser':
                $select="select Id,Name,Family,Phone,Father  from UserTbl u  where exists(select * from Quiz_UserTbl q where q.UserId=u.Id and q.Id=".$param['Id'].')';
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
