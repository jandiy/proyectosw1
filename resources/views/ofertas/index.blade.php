@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Gestionar Oferta</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app"  href="{{ route('ofertas.create') }}"><i class="fa  fa-user-plus"></i>
                    Registrar Oferta
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
            <th>Id</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($ofertas as $key => $oferta)
            <tr>
                <td>{{ $oferta->id }}</td>
                <td>{{ $oferta->fecha_inicio }}</td>
                <td>{{ $oferta->fecha_fin}}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px"  href="" data-target="#modal-mostrar-{{$oferta->id}}" data-toggle="modal"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('ofertas.edit',$oferta->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$oferta->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
             @include('ofertas.mostrar')
            @include('ofertas.modal')
           
        @endforeach
        </tbody>
    </table>
</div>
@endsection
