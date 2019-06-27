<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCarrito extends Model
{
    protected $table = "detalle_carrito";
    protected $fillable = ['id','producto_id','cantidad','carrito_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
