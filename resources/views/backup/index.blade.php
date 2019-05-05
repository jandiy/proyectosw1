@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Administrar Backup</h1>
            </div>
            <div class="pull-right">

                <a id="create-new-backup-button" class="btn btn-app" href="{{route('backup.create') }}"><i class="fa  fa-user-plus"></i>
                   Crear Backup
                </a>

            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif   
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>nro</th>
            <th>Name</th>
            <th>Tamaño</th>
            <th>Fecha</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>        
            @foreach ($backups as $key => $back)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$back['file_name']}}</td>
                    <td>{{$back['file_size']}}</td>
                    <td>{{$back['last_modified']}}</td>
                    <td style="width: 200px;">
                        <a href="{{route('backup.download',$back['file_name'])}}" class="btn btn-primary btn-sx"><i class="fa fa-dowload"></i>Descargar</a>
                        <a href="{{route('backup.delete',$back['file_name'])}}" class="btn btn-danger btn-sx"><i class="fa fa-remove"></i>Eliminar</a>
                        <button type="button" class="btn btn-danger btn-sx" style="min-width: 30px;height: 30px" data-toggle="modal" data-target="#exampleModal">
                           restaurar
                        </button>

                    </td>
                </tr>
            @endforeach       
        </tbody>
    </table>


    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Confirmacion de la Restauracion</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
