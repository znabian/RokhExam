<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public static $infoData = [
            [
                'label' => 'نام و نام خانوادگی خود را وارد کنید',
                'inputName' => 'name'
            ],
            [
                'label' => 'در کدام شهر سکونت دارید؟',
                'inputName' => 'city'
            ],
            [
                'label' => 'شماره موبایل خود را وارد کنید',
                'inputName' => 'phone'
            ],
            [
                'label' => 'سن',
                'inputName' => 'age'
            ],
        ];

    protected $table = 'Quiz_QuestionTbl';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'Answers' => 'array'
    ];
}
