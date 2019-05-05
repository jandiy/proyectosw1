<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $permissions = Permission::orderBy('id','DESC')
        ->where('permissions.name','<>','permission_admin')
        ->get();    
        
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('permissions.create',compact('permission'));
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
            'name' => 'required|unique:permissions,name',           
            'description' => 'required',            
        ]);


        $permision = new Permission();
        $permision->name = $request->input('name');
        $permision->description =$request->input('description');
        $permision->save();


        
        
        return redirect()->route('permissions.index')
            ->with('success','Permiso Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);        

        return view('permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);  
            

        return view('permissions.edit',compact('permission'));
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
       

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->description = $request->input('description');
        $permission->save();

        

        

        return redirect()->route('permissions.index')
            ->with('success','Permiso Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permissions.index')
            ->with('success','Permiso Borrado Exitosamente');
    }
}
