<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = "compras";
    protected $fillable = ['id','fecha','monto','provedor_id','user_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
