<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        DB::insert('insert into roles (name,description) values (?,?)', [ 'Admin','This is the group that sees everything']);
        DB::insert('insert into roles (name,description) values (?,?)', [ 'Placeholder Group','This is the group that sees everything']);
        DB::insert('insert into roles (name,description) values (?,?)', [ 'repartidor','This is the group that sees everything']);
        DB::insert('insert into roles (name,description) values (?,?)', [ 'cliente','This is the group that sees everything']);

        DB::insert('insert into permissions (name,description) values (?,?)', [ 'permission_admin','this is the permission that allows user to see everything']);
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'Permiso_Para_Hacer_Algo_1','Este es un permiso prueba 1, Este es un permiso prueba 1, Este es un permiso prueba 1, Este es un permiso prueba 1']);
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'Permiso_Para_Hacer_Algo_2','Este es un permiso prueba 2, Este es un permiso prueba 2, Este es un permiso prueba 2, Este es un permiso prueba 2']);
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'gestionar_productos','permite crear, editar, eliminar y aumentar producto']);
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'realizar_compras','permite comprar']);
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'realizar_entregas','permite entregar pedido']);
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'realizar_parametrizacion','permite realizar parametrizacion']);

        DB::insert('insert into permission_role (permission_id,role_id) values (?,?)', [ '1','1']);
        DB::insert('insert into permission_role (permission_id,role_id) values (?,?)', [ '4','1']);
        DB::insert('insert into permission_role (permission_id,role_id) values (?,?)', [ '7','1']);
        DB::insert('insert into permission_role (permission_id,role_id) values (?,?)', [ '6','3']);
        DB::insert('insert into permission_role (permission_id,role_id) values (?,?)', [ '5','4']);
        
        \App\User::insert([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('123123')
        ]);
        \App\User::insert([
            'name'=>'jandira',
            'email'=>'jan@gmail.com',
            'telefono'=>'3442635',
            'direccion'=>'urb 24 de septiembre',
            'password' => Hash::make('123123')
        ]);
        \App\User::insert([
            'name'=>'fernando',
            'email'=>'fernando@gmail.com',
            'telefono'=>'72185300',
            'direccion'=>'4to anillo',
            'password' => Hash::make('123123')
        ]);
        DB::insert('insert into role_user (user_id,role_id) values (?,?)', [ '1','1']); 
        DB::insert('insert into role_user (user_id,role_id) values (?,?)', [ '3','3']); 
        DB::insert('insert into role_user (user_id,role_id) values (?,?)', [ '2','4']); 
        DB::insert('insert into categoria (nombre,subcategoria) values (?,?)', [ 'Lacteo','soya']);
        DB::insert('insert into marca (nombre) values (?)', [ 'Delicia']);
        DB::insert('insert into marca (nombre) values (?)', [ 'Pil Andina']); 
        DB::insert('insert into medida (nombre,abreviatura) values (?,?)', [ 'Litro','lt.']);  
         DB::insert('insert into medida (nombre,abreviatura) values (?,?)', [ 'Kilo','kg.']); 
          DB::insert('insert into medida (nombre,abreviatura) values (?,?)', [ 'mililitro','ml.']);   
    }
}
