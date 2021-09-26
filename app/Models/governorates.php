<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class governorates extends Model
{
    use HasFactory;
    protected $table = "governorates";
    protected $fillable = ['governorate_name_ar','governorate_name_en'];
    public $timestamps=false;
}
