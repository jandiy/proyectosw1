@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Gestionar Medida</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app" href="" data-target="#modal-crear" data-toggle="modal"><i class="fa  fa-user-plus"></i>
                    Registrar Medidas
                </a>
               
            </div>
        </div>
    </div>
     @include('medidas.crear')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Id</th>
            <th>Medida</th>
            <th>Abreviatura</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($medidas as $key => $medida)
            <tr>
                <td>{{ $medida->id }}</td>
                <td>{{ $medida->nombre }}</td>
                <td>{{ $medida->abreviatura }}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px"  href="" data-target="#modal-mostrar-{{$medida->id}}" data-toggle="modal"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-update-{{$medida->id}}" data-toggle="modal"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$medida->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
             @include('medidas.mostrar')
            @include('medidas.modal')
            @include('medidas.editar')
        @endforeach
        </tbody>
    </table>
</div>
@endsection
