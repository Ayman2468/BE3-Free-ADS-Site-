<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $fillable = ['ad_id','owner_id','user_id','comment','seen_status'];
}
