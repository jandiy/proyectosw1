<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Producto;
use App\Categoria;
use App\Medida;
use App\Marca;

class ProductoController extends Controller
{
     public function index()
    {
        $promedio=DB::select("select p.codigo, avg(c.puntuacion) as promedio
        from producto as p, calificacion as c
        where c.producto_id=p.codigo
        group by p.codigo");
        //dd($promedio);
        $productos = DB::select("select p.codigo,p.nombre, c.nombre as categoria, me.nombre as medida, ma.nombre as marca, p.imagen , p.precio, p.descripcion, p.cantidad
        	from producto as p, medida as me, marca as ma, categoria as c
        	where p.categoria_id=c.id and p.medida_id=me.id and p.marca_id=ma.id");
        return view('productos.index',compact('productos','promedio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();
        $marcas = Marca::get();
        $medidas = Medida::get();
        return view('productos.create',compact('categorias','marcas','medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad'=> 'required|numeric', 
            'precio'=> 'required|numeric', 
            'categoria' => 'required',  
            'medida' => 'required', 
            'marca' => 'required',                     
        ]);

        $producto = new Producto();
        $producto->nombre  = $request->input('nombre');
        $producto->cantidad = $request->input('cantidad');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria');
        $producto->medida_id = $request->input('medida');
        $producto->marca_id = $request->input('marca');
        $producto->estado ='Disponible';
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload',$filename);
           $producto->imagen=$filename;
          }
        $producto->save();

        // self::registrarEnBitacora("Se registro una nueva categoria");

        return redirect()->route('productos.index')
            ->with('success','Producto Creado Exitosamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::get();
        $marcas = Marca::get();
        $medidas = Medida::get();
         return view('productos.edit',compact('categorias','producto','medidas','marcas'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad'=> 'required|numeric', 
            'precio'=> 'required|numeric', 
            'categoria' => 'required',  
            'medida' => 'required', 
            'marca' => 'required',                       
        ]);

        $producto = Producto::find($id);
        $producto->nombre  = $request->input('nombre');
        $producto->cantidad = $request->input('cantidad');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria');
        $producto->medida_id = $request->input('medida');
        $producto->marca_id = $request->input('marca');
        $producto->estado ='Disponible';
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload',$filename);
           $producto->imagen=$filename;
          }
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success','Producto Actualizado Exitosamente');    
    }

    public function updateB(Request $request, $id)
    {
        
        $this->validate($request, [
           
            'cantidad'=> 'required|numeric', 
                                  
        ]);

        $producto = Producto::find($id);
        $producto->cantidad = $request->input('cantidad');
       
        $producto->update();

        return redirect()->route('productos.index')
            ->with('success','Cantidad de producto Actualizado Exitosamente');    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('producto')->where('codigo',$id)->delete();
        return redirect()->route('productos.index')
            ->with('success','Producto Borrado Exitosamente');
   
    }
}
