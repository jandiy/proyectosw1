@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar posicion</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posiciones.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nro Estante:</strong>
                {{ $posicion->nroestante}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nro Fila:</strong>
                {{ $posicion->nrofila }}
            </div>
        </div>
        
    </div>
</div>
@endsection