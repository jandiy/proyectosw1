<div class="modal modal-default fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-mostrar-{{$medida->id}}"
     style="(display: block; padding-right: 17px;)">
    
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Informacion</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <strong>Nombre:</strong>
                {{ $medida->nombre }}
                </div>
                <div class="form-group">
                <strong>Abreviatura:</strong>
                {{ $medida->abreviatura }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>

        </div>

    </div>

</div>