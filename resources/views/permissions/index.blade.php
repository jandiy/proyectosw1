@extends('layouts.admin')
@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Permisos</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-app" href="{{ route('permissions.create') }}"><i class="fa  fa-plus"></i>
                    Registrar Permiso
                </a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Nombre</th>
            <th>Descripcion</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($permissions as $key => $permission)
            <tr>                
                <td>{{ $permission->name}}</td>
                <td>{{ $permission->description}}</td>
            
            <td>
                <a class="btn btn-app" style="min-width: 60px;height: 60px" href="{{ route('permissions.show',$permission->id) }}"><i class="fa  fa-info"></i>
                    Show
                </a>
                <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('permissions.edit',$permission->id) }}"><i class="fa fa-edit"></i>
                    Editar
                </a>
                <a class="btn btn-app"  style="min-width: 60px;height: 60px" 
                    href="" data-target="#modal-delete-{{$permission->id}}"
                     data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>                   
            </td>
            </tr>
            @include('permissions.modal')
            
        @endforeach
        </tbody>
    </table>
    </div>
@endsection