@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="pull-left" >            
            <a class="btn btn-primary glyphicon glyphicon-arrow-left" 
            style="font-size:20px"href="{{ route('roles.index') }}"></a>
    </div>
    <br/> 
    <br/>
        
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 >Editar Grupo</h1>
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
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>


                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id,
                         in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        
                        {{ $value->name }}</label>
                    <br/>
                @endforeach


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
    {!! Form::close() !!}
@endsection