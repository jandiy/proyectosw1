@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1> Mostrar Detalles del Permiso</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $permission->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {{ $permission->description }}
            </div>
        </div>
        
    </div>
    </div>
@endsection