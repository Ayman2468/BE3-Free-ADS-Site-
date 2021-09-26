<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand_models extends Model
{
    use HasFactory;
    protected $table = "brand_models";
    protected $fillable = ['brand_id','model'];
    public $timestamps=false;
}
