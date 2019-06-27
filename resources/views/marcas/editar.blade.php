<div class="modal modal-default fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-update-{{$marca->id}}"
     style="(display: block; padding-right: 17px;)">
    
    {!! Form::model($marca, ['method' => 'PATCH','route' => ['marcas.update', $marca->id]]) !!}
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Editar Marca</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'nombre','class' => 'form-control')) !!}
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