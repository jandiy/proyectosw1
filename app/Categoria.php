<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";
    protected $fillable = ['id','nombre','subcategoria'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
