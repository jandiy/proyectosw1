@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Producto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productos.index') }}"> Atras</a>
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
    {!! Form::open(array('route' => 'productos.store','method'=>'POST','files'=>'true')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Precio:</strong>
                {!! Form::text('precio', null, array('placeholder' => 'precio','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Cantidad:</strong>
                {!! Form::number('cantidad', null, array('max'=>'10000000000000000','min'=>'1','placeholder' => '0','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                   <strong>Imagen:</strong>
                  {{  csrf_field() }}
                  <label for="file"></label>
                  <input type="file" name="file">

            </div>
         </div>
         <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                    <strong>Categoria:</strong>
                    <select name="categoria" class="form-control selectpicker"  id="categoria" data-live-search="true">
                    @foreach($categorias as $key => $t)
                        <option value="{{$t->id}}">{{$t->nombre}} &nbsp;&nbsp;{{$t->subcategoria}}</option>
                    @endforeach
                    </select>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                    <strong>Marca:</strong>
                    <select name="marca" class="form-control selectpicker"  id="marca" data-live-search="true">
                    @foreach($marcas as $key => $t)
                        <option value="{{$t->id}}">{{$t->nombre}}</option>
                    @endforeach
                    </select>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                    <strong>Medida:</strong>
                    <select name="medida" class="form-control selectpicker"  id="medida" data-live-search="true">
                    @foreach($medidas as $key => $t)
                        <option value="{{$t->id}}">{{$t->abreviatura}}</option>
                    @endforeach
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {!! Form::textarea('descripcion', null, array('placeholder' => 'descripcion','class' => 'form-control','rows'=>'2','cols'=>'1')) !!}
            </div>
        </div>
        
        

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      
            <button type="submit" class="btn btn-primary">Guardar</button>
 
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection