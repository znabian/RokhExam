<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'Quiz_ResultTbl';

    public $timestamps = false;

    protected $primaryKey = 'Id';
}
