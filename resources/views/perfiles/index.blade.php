@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Perfil del Usuario</h1>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example1" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            
            <th>Nombre</th>
            <th>Email</th>
            <th>Grupo</th>            
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        
            <tr>
                
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->nombrerole }}</td>                
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="{{ route('perfiles.show',$data->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('perfiles.edit',$data->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>                    
                </td>
            </tr>
            @include('perfiles.modal')
        
        </tbody>
    </table>
</div>
@endsection
