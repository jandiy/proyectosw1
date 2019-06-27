<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use App\Entrega;
use DB;
use App\DetalleCarrito;
use Illuminate\Support\Facades\Auth;

class EntregaController extends Controller
{
   public function index()
    {
        $carts =DB::select("select c.id, c.total, u.name, u.latitud, u.longitud, u.telefono, u.email, c.fecha
        	from carrito as c, users as u
        	where c.user_id=u.id");        
        $detalles =DB::select("select c.id, p.nombre as producto, p.precio, dc.cantidad, c.total, m.nombre as marca, (p.precio*dc.cantidad) as subtotal
        	from carrito as c, detalle_carrito as dc, producto as p, marca as m 
        	where dc.producto_id=p.codigo and dc.carrito_id=c.id and p.marca_id=m.id "); 
        $asignadas = DB::select("select c.id, e.estado
        	from entrega as e, carrito as c 
        	where e.carrito_id=c.id");

        $noasignadas = DB::select("select c.id
        	from carrito as c 
        	where c.id not in (select e.carrito_id from entrega as e)");  
                        
         return view('entregas.index',compact('carts','detalles','asignadas' ,'noasignadas'));

    }
     public function indexB()
    {
    	$user = Auth::user();
        $carts =DB::select("select distinct c.id, c.total, u.name, u.latitud, u.longitud, u.telefono, u.email, c.fecha
        	from carrito as c, users as u, users as re, entrega as e
        	where c.user_id=u.id and e.carrito_id=c.id and e.user_id=".$user->id);   
        
        $detalles =DB::select("select c.id, p.nombre as producto, p.precio, dc.cantidad, c.total, m.nombre as marca, (p.precio*dc.cantidad) as subtotal
        	from carrito as c, detalle_carrito as dc, producto as p, marca as m 
        	where dc.producto_id=p.codigo and dc.carrito_id=c.id and p.marca_id=m.id "); 
        $asignadas = DB::select("select c.id, e.estado
        	from entrega as e, carrito as c 
        	where e.carrito_id=c.id");
       

         return view('entregas.mi',compact('carts','detalles','asignadas'));

    }
    public function update(Request $request, $id){

    	$user = Auth::user();
    	$entrega = new Entrega();
    	$entrega->carrito_id= $id;
    	$entrega->user_id=$user->id;
    	$entrega->estado='asignada';
    	$entrega->save();

    	return redirect()->route('entregas.index')
            ->with('success','Entrega procesada Exitosamente'); 

    }

    public function updateB(Request $request, $id){

    	$user = Auth::user();

    	$valor=DB::select("select * from entrega");
    	
    	foreach ($valor as $key => $val) {

    		if($val->carrito_id==$id){

    			$entrega=Entrega::find($val->id);
    			$entrega->estado='realizada';
    		    $entrega->update();

    		}
    	}
    	

    	return redirect()->route('carts.indexB')
            ->with('success','Entrega realizada Exitosamente'); 

    }
}
