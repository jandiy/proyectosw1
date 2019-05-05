@extends('layouts.admin')
@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Bitacora</h2>
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
        
        <th>Usuario</th>
        <th>Accion</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Email</th>        

        </thead>
        
        <tbody>
        @foreach ($bitacoras as $key => $bitacora)
            <tr>                
                <td>{{ $bitacora->user}}</td>
                <td>{{ $bitacora->accion}}</td>
                <td>{{ $bitacora->fecha}}</td>
                <td>{{ $bitacora->hora}}</td>
                <td>{{ $bitacora->email}}</td>                                
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
@endsection