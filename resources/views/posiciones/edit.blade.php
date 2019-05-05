@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Posicion</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posiciones.index') }}"> Back</a>
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
    {!! Form::model($posicion, ['method' => 'PATCH','route' => ['posiciones.update', $posicion->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nro estante:</strong>
                {!! Form::number('nroestante', null, array('placeholder' => 'Nro estante','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nro fila:</strong>
                {!! Form::number('nrofila', null, array('placeholder' => 'Nro fila','class' => 'form-control')) !!}
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </div>
</div>
    {!! Form::close() !!}
@endsection