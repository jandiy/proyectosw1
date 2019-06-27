<div class="modal modal-default fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-update-{{$oferta->id}}"
     style="(display: block; padding-right: 17px;)">
    
    {!! Form::model($oferta, ['method' => 'PATCH','route' => ['ofertas.update', $oferta->id]]) !!}
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Editar Oferta</h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                <strong>Fecha Inicio:</strong>
                  {!! Form::date('fecha_inicio',\Carbon\Carbon::now()) !!}
            </div>
            <div class="form-group">
                <strong>Fecha Fin:</strong>
                 {!! Form::date('fecha_fin',\Carbon\Carbon::now()) !!}
            </div>
             <div class="form-group">
                    <strong>Producto:</strong>
                    <select name="producto" class="form-control selectpicker"  id="producto" data-live-search="true">
                    @foreach($productos as $key => $t)
                        <option value="{{$t->codigo}}">{{$t->nombre}} &nbsp;&nbsp;{{$t->marca}}</option>
                    @endforeach
                    </select>
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