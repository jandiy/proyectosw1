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
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'permission_admin','this is the permission that allows user to see everything']);
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'Permiso_Para_Hacer_Algo_1','Este es un permiso prueba 1, Este es un permiso prueba 1, Este es un permiso prueba 1, Este es un permiso prueba 1']);
        DB::insert('insert into permissions (name,description) values (?,?)', [ 'Permiso_Para_Hacer_Algo_2','Este es un permiso prueba 2, Este es un permiso prueba 2, Este es un permiso prueba 2, Este es un permiso prueba 2']);
        DB::insert('insert into permission_role (permission_id,role_id) values (?,?)', [ '1','1']);
        \App\User::insert([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('123123')
        ]);
        DB::insert('insert into role_user (user_id,role_id) values (?,?)', [ '1','1']);        
    }
}
