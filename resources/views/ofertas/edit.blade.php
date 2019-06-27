@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Oferta</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Back</a>
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
    {!! Form::model($oferta, ['method' => 'PATCH','route' => ['ofertas.update', $oferta->id]]) !!}
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
           <div class="form-group">
                <strong>Fecha Inicio:</strong>
                  {!! Form::date('fecha_inicio',\Carbon\Carbon::now(), array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
             <div class="form-group">
                <strong>Fecha Fin:</strong>
                 {!! Form::date('fecha_fin',\Carbon\Carbon::now(), array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Producto:</strong>
                    <select name="producto" class="form-control selectpicker"  id="producto" data-live-search="true">
                    @foreach($productos as $key => $t)
                        <option value="{{$t->codigo}}">{{$t->nombre}} &nbsp;&nbsp;{{$t->marca}}</option>
                    @endforeach
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Porcentaje:</strong>
                {!! Form::number('interes', null, array('max'=>'99','min'=>'1','placeholder' => '0','class' => 'form-control')) !!}
            </div>
        </div>
         
         
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </div>
    {!! Form::close() !!}

</div>
@endsection