@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Laboratorio</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('laboratorios.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'laboratorios.store','method'=>'POST')) !!}
    <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {!! Form::text('descripcion', null, array('placeholder' => 'descripcion','class' => 'form-control')) !!}
            </div>
        </div>        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Logo">Pais de Origen:</label>
            <br> 
            <select class="bot" name="pais_id" id="select">
                @foreach ($paises as $key => $pais)
                    <option value="{{$pais->id }}">{{$pais->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection