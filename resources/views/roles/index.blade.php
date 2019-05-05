@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Administracion de Grupos</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-app" style="color:#00a65a" href="{{ route('roles.create') }}"><i class="fa  fa-plus"></i>
                    Registrar Grupo
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
            
            <th>Nombre Grupo</th>
            <th>Description</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($roles as $key => $role)
            <tr>                
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px;color:#00c0ef" href="{{ route('roles.show',$role->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px;color:#f39c12" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px;color:#dd4b39" 
                        href="" data-target="#modal-delete-{{$role->id}}" 
                        data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                </td>
            </tr>
            @include('roles.modal')
        @endforeach
        </tbody>
    </table>

    </div>

@endsection