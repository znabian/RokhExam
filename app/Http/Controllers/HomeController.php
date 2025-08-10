<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
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
            'exam_msg' => $exam['Message']
        ], now()->addMinutes(config('quiz.cache_minutes')));

        return view('home', compact('url','exam'));
    }
}
