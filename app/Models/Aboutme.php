<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Aboutme extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'address' ,'phone' , 'degree' , 'date_of_birth' ];
    protected $dates = ['date_of_birth'];

}

