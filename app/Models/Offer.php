<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = ['Name_ar' ,'Name_en' , 'Price' ,'details_ar' ,'details_en'];
    protected $hidden = ['updated_at' , 'created_at'];
    public $timestamp = false;
}
