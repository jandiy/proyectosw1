@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Gestionar Acciones Terapeuticas</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app" href="{{ route('acciones.create') }}"><i class="fa  fa-user-plus"></i>
                    Registrar Accion Terapeutica
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
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($acciones as $key => $accion)
            <tr>
                <td>{{ $accion->nombre }}</td>
                
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="{{ route('acciones.show',$accion->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('acciones.edit',$accion->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$accion->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
            @include('acciones.modal')
        @endforeach
        </tbody>
    </table>
</div>
@endsection
