<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_brands extends Model
{
    use HasFactory;
    protected $table = "car_brands";
    protected $fillable = ['brand_en','brand_ar'];
    public $timestamps=false;
}
