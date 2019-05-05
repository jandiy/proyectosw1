@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Home</h1>
                <h2>Bienvenido {{$user->name}}</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Lista de activo fijos</div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
       
        </div>
    </div>



@endsection




