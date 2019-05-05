<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = "medicamentos";
    protected $fillable = ['id','nombre','descripcion','pventa','stock','laboratorio_id',
    'categoria_id','accionesterapeuticas_id','lote_id','posicion_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
