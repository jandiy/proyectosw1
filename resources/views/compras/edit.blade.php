@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Compras</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('compras.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($compra, ['method' => 'PATCH','route' => ['compras.update', $compra->id]]) !!}
    <div class="row">                
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha:</strong>
                {!! Form::date('fecha', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Monto Total:</strong>
                {!! Form::number('monto', null, array('placeholder' => 'monto','class' => 'form-control')) !!}
            </div>
        </div>        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Logo">Provedor:</label>
            <br> 
            <select class="bot" name="provedor_id" id="select">
                @foreach ($provedores as $key => $provedor)
                    <option value="{{$provedor->id }}">{{$provedor->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Logo">Medicamento:</label>
            <br> 
            <select class="bot" name="medica_id" id="select">
                @foreach ($medicamentos as $key => $medicamento)
                    <option value="{{$medicamento->id }}">{{$medicamento->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio De Compra:</strong>
                {!! Form::number('pcompra', null, array('placeholder' => 'precio de venta','class' => 'form-control')) !!}
            </div>
        </div>        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cantidad:</strong>
                {!! Form::number('cantidad', null, array('placeholder' => 'stock','class' => 'form-control')) !!}
            </div>
        </div>        

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection