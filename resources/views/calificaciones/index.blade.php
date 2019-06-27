@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Top 5</h1>
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
    @permission('gestionar_productos')
      <table id="example" class="display" cellspacing="0" width="100%">
    @endpermission
    @permission('realizar_compras')
      <table id="example2" class="display" cellspacing="0" width="100%">
    @endpermission
    
        <thead>
        <tr>            
            <th>Puntuacion</th>
            <th>Nombre</th>
            <th width="280px"></th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($promedios as $key => $producto)
            <tr>
                <td>{{ $producto->promedio}}</td>
                <td>{{ $producto->nombre }}</td>
                <td><img src="{{Storage::Url('upload/'.$producto->imagen) }}" alt="{{$producto->imagen}}" height="250vh" width="250vh" class="img-thumbnail"></td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="" data-target="#modal-mostrar-{{$producto->codigo}}" data-toggle="modal"><i class="fa  fa-info"></i>
                        Show
                    </a>
                   
                   
                   @permission('realizar_compras')
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-adicionar-{{$producto->codigo}}" data-toggle="modal"><span class="glyphicon glyphicon-shopping-cart"></span>
                    ADD TO CART
                    </a>
                    
                    @endpermission
                    
                </td>
            </tr>
             @include('productos.adicionar')
            @include('calificaciones.mostrar')
        @endforeach
        </tbody>
    </table>
</div>
@endsection