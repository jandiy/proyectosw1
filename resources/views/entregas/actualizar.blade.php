<div class="modal modal-warning fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-actualizar-{{$cart->id}}"
     style="(display: block; padding-right: 17px;)">
    
    {!! Form::model($cart, ['method' => 'PATCH','route' => ['entregas.updateB', $cart->id]]) !!}
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Marcar como realizado</h4>
            </div>
            <div class="modal-body">
               Esta seguro que desea marcar como pedido entregado
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="sumbit" class="btn btn-primary">Confirmar</button>
            </div>

        </div>

    </div>

   {!! Form::close() !!}

</div>