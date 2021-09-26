<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    use HasFactory;
    protected $table = "admins";
    protected $fillable = ['email', 'password', 'position','user_id'];
    public $timestamps = false;
        public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
