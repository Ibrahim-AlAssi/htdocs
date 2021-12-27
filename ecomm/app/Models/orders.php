<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'order';
    use HasFactory;
    public function product(){
        return $this->belongsTo(prodect::class,'prodect_id');


    }
    public function user(){
        return $this->belongsTo(User::class,'ecoms1_id');
    }
}
