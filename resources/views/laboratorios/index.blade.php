@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Gestionar Laboratorios</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app" href="{{ route('laboratorios.create') }}"><i class="fa  fa-user-plus"></i>
                    Registrar Laboratorios
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
            <th>Lugar de Origen</th>            
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($laboratorios as $key => $laboratorio)
            <tr>
                <td>{{ $laboratorio->nombre }}</td>
                <td>{{ $laboratorio->descripcion }}</td>
                <td>{{ $laboratorio->paisnombre }}</td>
                
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="{{ route('laboratorios.show',$laboratorio->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('laboratorios.edit',$laboratorio->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$laboratorio->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
            @include('laboratorios.modal')
        @endforeach
        </tbody>
    </table>
</div>
@endsection
