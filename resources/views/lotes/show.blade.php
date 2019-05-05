@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Lote</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lotes.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Codigo:</strong>
                {{ $lote->codigo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de produccion:</strong>
                {{ $lote->fechaproduccion }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de Vencimiento:</strong>
                {{ $lote->fechavencimiento }}
            </div>
        </div>
    </div>
</div>
@endsection