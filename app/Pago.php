<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
   protected $table = "pago";
    protected $fillable = ['id','txtHash','carrito_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
