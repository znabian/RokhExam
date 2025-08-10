<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $table = 'Quiz_UrlTbl';

    public function supporter()
    {
        return $this->belongsTo(Supporter::class, 'Support_Id', 'Id');
    }
}
