<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Hash;
use Illuminate\Support\Arr;


class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();                    
        $data = DB::table('users')                
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->select('users.name','users.email','users.id','roles.name as nombrerole')
            ->where('users.id',$user->id)
            ->get();
        $data = $data[0];
        // dd($data->name);
        return view('perfiles.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('perfiles.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // $roles = Role::pluck('name','id');
        if($user->id ==1){
            $roles = DB::table('roles')                               
            ->where('roles.name','Admin')
            ->pluck('name','id');  
        }else{
            $roles = DB::table('roles')                               
            ->where('roles.name','<>','Admin')
            ->pluck('name','id');        
        }                
        $userRole = $user->roles->pluck('id','id')->toArray();
        
        return view('perfiles.edit',compact('user','roles','userRole'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        
        $user->save();
        DB::table('role_user')->where('user_id',$id)->delete();


        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('perfiles.index')
            ->with('success','Usuario Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
