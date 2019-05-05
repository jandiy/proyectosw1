<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    protected $table = "provedores";
    protected $fillable = ['id','nombre','telefono','email','compania'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
