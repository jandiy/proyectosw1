<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Bitacora;
use App\Permission;
use DB;


class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = DB::table('bitacoras')
            ->select('*')
        ->orderBy('id','desc')
        ->get();
        return view('bitacoras.index',compact('bitacoras'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store($request,$accion)
    {
        
        $user=Auth::user();

        $bitacora=new Bitacora();
        $bitacora->user=$user->name;
        $bitacora->email=$user->email;
        $bitacora->fecha=date('Y-m-d');
        $bitacora->hora = date('H:m:s');
        $bitacora->accion=$accion;                        
        $bitacora->save();        
    }





}
