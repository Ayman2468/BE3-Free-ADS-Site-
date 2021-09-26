<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    use HasFactory;
    protected $table = "ads";
    protected $fillable = ['user_id','title','category_id','sub_category_id','details',
                           'images','governorates_id','cities_id','updated_at',
                           'created_at','year','payment_method','receiving_date',
                           'price','real_estate_type','space','bed_rooms',
                           'bathrooms','furnished','floor','additions','brand',
                           'model','condition1','engine','body_type','fuel',
                           'transmition','kilometers','color','mobile','call1'];
}
