@extends('layouts.admin')

@section('content')
    <div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Lista de Usuarios</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-app" style="color:#00a65a" href="{{ route('users.create') }}"><i class="fa  fa-user-plus"></i>
                    Registrar Usuario
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
            <th>Email</th>
            <th>Grupo</th>            
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($data as $key => $user)
            <tr>
                
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nombrerole }}</td>                
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px;color:#00c0ef" href="{{ route('users.show',$user->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px;color:#f39c12" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px;color:#dd4b39" href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                </td>
            </tr>
            @include('users.modal')
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
