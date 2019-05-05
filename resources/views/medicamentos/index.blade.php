@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Gestionar Medicamentos</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app" href="{{ route('medicamentos.create') }}"><i class="fa  fa-user-plus"></i>
                    Registrar Medicamento
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
            <th>Precio Venta</th>
            <th>Stock</th>
            <th>Laboratorio</th>
            <th>Categoria</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($medicamentos as $key => $medicamento)
            <tr>
                <td>{{ $medicamento->nombre }}</td>
                <td>{{ $medicamento->descripcion }}</td>
                <td>{{ $medicamento->pventa }}</td>
                <td>{{ $medicamento->stock }}</td>
                <td>{{ $medicamento->laboratorio_nombre }}</td>
                <td>{{ $medicamento->categoria_nombre }}</td>
                
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="{{ route('medicamentos.show',$medicamento->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('medicamentos.edit',$medicamento->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$medicamento->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
            @include('medicamentos.modal')
        @endforeach
        </tbody>
    </table>
</div>
@endsection
