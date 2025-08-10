<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'Id';

    protected $table = 'Quiz_PatternTbl';

    public $timestamps = false;
}
