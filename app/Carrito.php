<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = "carrito";
    protected $fillable = ['id','user_id','fecha','total'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
