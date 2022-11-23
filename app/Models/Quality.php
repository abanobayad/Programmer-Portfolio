<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'desc' , 'org' ,'type' ,'start_at' , 'end_at'];
    protected $dates = ['start_at' , 'end_at'];
}
