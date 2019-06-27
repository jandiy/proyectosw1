<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use App\Carrito;
use App\User;
use App\Producto;
use App\Pago;
use App\DetalleCarrito;
use Config;
class CartController extends Controller
{
   

    public function add(Request $request, $id)
    {
    	 $this->validate($request, [
           
            'cantidad'=> 'required|numeric', 
                                
        ]);

    	$cantidad = $request->input('cantidad');
    	$valor= Producto::find($id);
    	if($valor->cantidad >= $cantidad){
    		$detalle= new DetalleCarrito();
    		$detalle->cantidad= $cantidad;
    		$detalle->producto_id= $id;
    		$detalle->carrito_id=null;
    		$detalle->save();
    		$valor->cantidad = $valor->cantidad - $cantidad;
    		$valor->update();

    		return redirect()->route('productos.index')
            ->with('success','Adicionado al Carrito Exitosamente'); 
    	}

    	else {
    	return redirect()->route('productos.index')
            ->with('success','la cantidad es mayor a la disponible');  
         }  
        
    }

    public function index(Request $request){
    	$carts= DB::select("select p.codigo, p.nombre, p.precio, dc.cantidad, (dc.cantidad*p.precio) as subtotal, dc.id
    		from detalle_carrito as dc, producto as p 
    		where dc.producto_id=p.codigo and dc.carrito_id is null");
    	
    	//dd($carts);
    	return view('carts.index',compact('carts'));
    }
    public function destroy($id)
    {

        $valor = DetalleCarrito::find($id);
        $producto= Producto::find($valor->producto_id);
        $producto->cantidad=$producto->cantidad + $valor->cantidad;
        $producto->update();
        DB::table('detalle_carrito')->where('id',$id)->delete();
        return redirect()->route('carts.index')
            ->with('success','Item Eliminado Exitosamente');
   
    }

    public function store(Request $request){
        $this->validate($request, [
           
            'latitude'=> 'required', 
            'longitude'=> 'required', 
            'txtHash'=>'required',                  
        ]);
       
       
        $carts= DB::select("select p.codigo, p.nombre, p.precio, dc.cantidad, (dc.cantidad*p.precio) as subtotal, dc.id
            from detalle_carrito as dc, producto as p 
            where dc.producto_id=p.codigo and dc.carrito_id is null");
        $total=0;
        if(count($carts)>0){
            foreach ($carts as $key => $value) {
            $total=$total+$value->subtotal*1;
            }

            $carrito = new Carrito();
            $carrito->total=$total;
            $user= Auth::user();
            $carrito->user_id=$user->id;
            $time= Carbon::now('America/La_Paz');
            $carrito->fecha = $time->toDateString();
            $carrito->save();



            $ahora=Auth::user();
            $actualizar= User::find($ahora->id);
            $actualizar->longitud=$request->input('longitude');
            $actualizar->latitud=$request->input('latitude');
            $actualizar->update();

            $pago= new Pago();
            $pago->carrito_id=$carrito->id;
            $pago->txtHash=$request->input('txtHash');
            $pago->save();

            foreach ($carts as $key => $value) {
            $detalle = DetalleCarrito::find($value->id);
            $detalle->carrito_id=$carrito->id;
            $detalle->update();

            }

            

        }

         return redirect()->route('carts.index')
            ->with('success','Compra Realizada Exitosamente');
    }

    public function indexB(){
        $user = Auth::user();
        $carts =DB::select("select c.id, c.total, u.name, u.latitud, u.longitud, u.telefono, u.email, c.fecha
            from carrito as c, users as u
            where c.user_id=u.id and u.id=".$user->id);        
        $detalles =DB::select("select c.id, p.nombre as producto, p.precio, dc.cantidad, c.total, m.nombre as marca, (p.precio*dc.cantidad) as subtotal
            from carrito as c, detalle_carrito as dc, producto as p, marca as m 
            where dc.producto_id=p.codigo and dc.carrito_id=c.id and p.marca_id=m.id "); 
        $asignadas = DB::select("select c.id, e.estado
            from entrega as e, carrito as c 
            where e.carrito_id=c.id");

        $noasignadas = DB::select("select c.id
            from carrito as c 
            where c.id not in (select e.carrito_id from entrega as e)");  
                        
         return view('carts.indexB',compact('carts','detalles','asignadas' ,'noasignadas'));

     
    }
}
