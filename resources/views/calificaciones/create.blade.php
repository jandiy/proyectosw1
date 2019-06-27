<div class="modal modal-default fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-calificacion-{{$producto->codigo}}"
     style="(display: block; padding-right: 17px;)">
   {!! Form::model($producto, ['method' => 'PATCH','route' => ['calificaciones.update', $producto->codigo],'files'=> 'true']) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Actualizar Cantidad</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <strong>Puntuacion(0-10):</strong>
                {!! Form::number('puntuacion', null, array('max'=>'10','min'=>'0','placeholder' => '0','class' => 'form-control')) !!}
            	</div>
                <div class="form-group">
                <strong>Comentario:</strong>
                {!! Form::text('comentario', null, array('placeholder' => 'comentario','class' => 'form-control')) !!}
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="sumbit" class="btn btn-primary">Confirmar</button>
            </div>

        </div>

    </div>

    {!! Form::close() !!}  

</div>