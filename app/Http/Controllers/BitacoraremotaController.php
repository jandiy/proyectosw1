<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Bitacoraremota;
use App\Permission;
use DB;

class BitacoraremotaController extends Controller
{
    public static function store($request,$accion)
    {
        $user=Auth::user();

        $bitacora=new Bitacoraremota();
        $bitacora->user=$user->name;
        $bitacora->email=$user->email;
        $bitacora->fecha=date('Y-m-d');
        $bitacora->hora = date('H:m:s');
        $bitacora->accion=$accion;           
        $bitacora->save();        
    }
}
