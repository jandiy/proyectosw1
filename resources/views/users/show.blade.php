@extends('layouts.admin')

@section('content')

            
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">            
    <div class="pull-left" >            
        <a class="btn btn-primary glyphicon glyphicon-arrow-left" 
        style="font-size:20px"href="{{ route('users.index') }}"></a>
    </div>
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 >Mostrar datos del Usuario</h1>
            <div class="form-group">
                <strong >Name:</strong>
                {{ $user->name }}
            </div>
            <div class="form-group">
                <strong>Email: </strong>
                {{ $user->email }}
            </div>
            <div class="form-group">
                <strong>Grupo:</strong>
                @if(!empty($user->roles))
                    @foreach($user->roles as $v)
                        <label class="label label-success" style="font-size:15px">{{ $v->name }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>  
</div>
    
@endsection