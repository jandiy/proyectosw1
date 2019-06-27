@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Pedidos</h1>
            </div>
            <div class="pull-right">

              
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example1" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th width="20px">Estado</th>
            <th>Id</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Cliente</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($carts as $key => $cart)
            <tr>
            	<?php
            	
            	foreach ($noasignadas as $key => $val) {

                    if($val->id == $cart->id){

                         echo '<td> <div style="min-width: 50px;height: 50px;background-color: red;"></div></td>';

                           
                   		 }
                
            	   }
            	   foreach ($asignadas as $key => $value) {

                    if($value->id == $cart->id){

                           if($value->estado=='asignada'){ 
                           echo '<td> <div style="min-width: 50px;height: 50px;background-color: yellow;"></div></td>';
                           }
                           if($value->estado=='realizada'){ 
                           echo '<td> <div style="min-width: 50px;height: 50px;background-color: green;"></div></td>';
                           }

                           
                   		 }
                
            	   }
            	?>
                <td>{{ $cart->id }}</td>
                <td>{{ $cart->fecha }}</td>
                <td>{{ $cart->total}}</td>
                <td>{{ $cart->name}}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="" data-target="#modal-mostrar-{{$cart->id}}" data-toggle="modal"><i class="fa  fa-info"></i>
                        Detalle
                    </a>
                     <a class="btn btn-app" style="min-width: 60px;height: 60px" href="" data-target="#modal-asignar-{{$cart->id}}" data-toggle="modal"><span class="glyphicon glyphicon-ok"></span>
                        Asignar
                    </a>
                  
                   
                </td>
            </tr>
            @include('entregas.mostrar')
            @include('entregas.asignar')
        @endforeach
        </tbody>
    </table>
</div>
@endsection