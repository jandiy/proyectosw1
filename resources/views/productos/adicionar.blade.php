<div class="modal modal-warning fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-adicionar-{{$producto->codigo}}"
     style="(display: block; padding-right: 17px;)">
   {!! Form::model($producto, ['method' => 'POST','route' => ['carts.add', $producto->codigo],'files'=> 'true']) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Agregar Carrito</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <strong>Cantidad:</strong>
                {!! Form::number('cantidad', null, array('max'=>'10000000000000000','min'=>'1','placeholder' => '0','class' => 'form-control')) !!}
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