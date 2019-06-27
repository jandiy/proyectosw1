<div class="modal modal-warning fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-crear"
     style="(display: block; padding-right: 17px;)">
    {!! Form::open(array('route' => 'carts.store','method'=>'POST')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Compra</h4>
            </div>
            <div class="modal-body">
               Seguro que desea realizar la compra
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="sumbit" class="btn btn-primary">Confirmar</button>
            </div>

        </div>

    </div>

   {!! Form::close() !!}

</div>