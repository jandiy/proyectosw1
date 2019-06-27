@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Gestionar Marca</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app" href="" data-target="#modal-crear" data-toggle="modal"><i class="fa  fa-user-plus"></i>
                    Registrar Marcas
                </a>
               
            </div>
        </div>
    </div>
     @include('marcas.crear')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Id</th>
            <th>Marca</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($marcas as $key => $marca)
            <tr>
                <td>{{ $marca->id }}</td>
                <td>{{ $marca->nombre }}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px"  href="" data-target="#modal-mostrar-{{$marca->id}}" data-toggle="modal"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-update-{{$marca->id}}" data-toggle="modal"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$marca->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
             @include('marcas.mostrar')
            @include('marcas.modal')
            @include('marcas.editar')
        @endforeach
        </tbody>
    </table>
</div>
@endsection
