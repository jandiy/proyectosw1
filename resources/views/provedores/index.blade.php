@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Gestionar Provedores</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app" href="{{ route('provedores.create') }}"><i class="fa  fa-user-plus"></i>
                    Registrar Provedor
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
            <th>Telefono</th>            
            <th>Email</th>            
            <th>Compania</th>            
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($provedores as $key => $provedor)
            <tr>
                <td>{{ $provedor->nombre }}</td>
                <td>{{ $provedor->telefono }}</td>
                <td>{{ $provedor->email }}</td>
                <td>{{ $provedor->compania }}</td>
                
                
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="{{ route('provedores.show',$provedor->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('provedores.edit',$provedor->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$provedor->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
            @include('provedores.modal')
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
