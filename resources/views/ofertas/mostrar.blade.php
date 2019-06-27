<div class="modal modal fade" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-mostrar-{{$oferta->id}}"
     style="(display: block; padding-right: 17px;)">
    
    
    <div class="modal-dialog modal-sm modal-notify modal-default" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Informacion</h4>
            </div>
            <div class="modal-body">
                <img src="{{Storage::Url('upload/'.$oferta->imagen) }}" alt="{{$oferta->imagen}}" height="250vh" width="150vh" class="img-thumbnail">
                <br>
                <br>
                <div class="form-group">
                <strong>Fecha Inicio:</strong>
                {{ $oferta->fecha_inicio }}
                </div>
                <div class="form-group">
                <strong>Fecha Fin:</strong>
                {{ $oferta->fecha_fin }}
                </div>
                <div class="form-group">
                <strong>Porcentaje:</strong>
                {{ $oferta->interes }}%
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>

        </div>

    </div>

</div>