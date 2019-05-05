@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Medicamentos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('medicamentos.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'medicamentos.store','method'=>'POST')) !!}
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
            <div class="form-group">
                <strong>Precio De Venta:</strong>
                {!! Form::number('pventa', null, array('placeholder' => 'precio de venta','class' => 'form-control')) !!}
            </div>
        </div>        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stock:</strong>
                {!! Form::number('stock', null, array('placeholder' => 'stock','class' => 'form-control')) !!}
            </div>
        </div>        
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Logo">Laboratorio:</label>
            <br> 
            <select class="bot" name="laboratorio_nombre" id="select">
                @foreach ($laboratorios as $key => $laboratorio)
                    <option value="{{$laboratorio->id }}">{{$laboratorio->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Logo">Categoria:</label>
            <br> 
            <select class="bot" name="categoria_nombre" id="select">
                @foreach ($categorias as $key => $categoria)
                    <option value="{{$categoria->id }}">{{$categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Logo">Accion Terapeutica:</label>
            <br> 
            <select class="bot" name="accion_nombre" id="select">
                @foreach ($acciones as $key => $accion)
                    <option value="{{$accion->id }}">{{$accion->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Logo">Codigo de Lote:</label>
            <br> 
            <select class="bot" name="lote_codigo" id="select">
                @foreach ($lotes as $key => $lote)
                    <option value="{{$lote->id }}">{{$lote->codigo }}</option>
                @endforeach
            </select>
        </div>        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Logo">Posicion/Hubicacion:</label>
            <label for="Logo">Nro de estante:</label>
            <br> 
            <select class="bot" name="posicion_nroestante" id="select">
                @foreach ($posiciones as $key => $posicion)
                    <option value="{{$posicion->id }}">{{$posicion->nroestante }}</option>
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