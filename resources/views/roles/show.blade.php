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
            <h1 >Mostrar Grupo</h1>
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>        
            <div class="form-group">
                <strong>Description:</strong>
                {{ $role->description }}
            </div>
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success" style="font-size:15px">{{ $v->name }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>       
</div>
@endsection