<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Carbon\Carbon;
class Lote extends Model
{

    use FormAccessible;
    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
     public function formDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    protected $table = "lotes";
    protected $fillable = ['id','codigo','fechaproduccion','fechavencimiento'];
    public $timestamps=false;
    protected $primaryKey = 'id';

}
