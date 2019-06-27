<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $table = "entrega";
    protected $fillable = ['id','user_id','estado','carrito_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
