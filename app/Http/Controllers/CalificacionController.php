<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Calificacion;
use App\Marca;
use App\Categoria;
use Illuminate\Support\Facades\Auth;

class CalificacionController extends Controller
{
    public function index(Request $request){
    	$promedios=DB::select("select p.codigo, CAST(avg(c.puntuacion) as integer) as promedio, p.nombre, p.precio, p.cantidad, p.descripcion,p.categoria_id, p.marca_id, p.imagen
        from producto as p, calificacion as c
        where c.producto_id=p.codigo 
        group by p.codigo
        order by avg(c.puntuacion) DESC LIMIT 5");
        $marcas=Marca::get();
        $categorias=Categoria::get();
    	//dd($promedios);
    	//dd($carts);
    	return view('calificaciones.index',compact('promedios','categorias','marcas'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
           
            'puntuacion'=> 'required|numeric', 
                                
        ]);
        $user= Auth::user();
        $calificacion = new Calificacion();
        $calificacion->puntuacion= $request->input('puntuacion');
        $calificacion->comentario= $request->input('comentario');
        $calificacion->producto_id=$id;
        $calificacion->user_id=$user->id;
        $calificacion->save();
        return redirect()->route('productos.index')
            ->with('success','Producto calificado exitosamente'); 
    }
}
