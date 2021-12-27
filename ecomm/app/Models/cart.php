<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\protectcontroller;

class cart extends Model
{
    protected $table = 'cart';
    use HasFactory;
    public function product(){
        return $this->belongsTo(prodect::class,'prodect_id');


    }
}
