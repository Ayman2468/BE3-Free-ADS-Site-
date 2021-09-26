<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;
    protected $table = "cities";
    protected $fillable = ['governorate_id','city_name_ar','city_name_en'];
    public $timestamps=false;
}
