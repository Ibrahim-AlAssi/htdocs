<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    use HasFactory;
    public function product(){
        return $this->belongsTo(prodect::class);


    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
