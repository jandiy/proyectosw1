




<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modal-mostrar-{{$producto->codigo}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">{{ $producto->nombre }}</p>
      </div>

      <!--Body-->
      <div class="modal-body">
      	<img src="{{Storage::Url('upload/'.$producto->imagen) }}" alt="{{$producto->imagen}}" height="250vh" width="150vh" class="img-thumbnail">
        <br>
        <br>
        <strong>Puntuacion:</strong>
        @foreach ($promedio as $key => $p)
          @if($p->codigo == $producto->codigo)
          {{ $p->promedio}}&nbsp;pts.
          @endif
        @endforeach
        <br>
        <strong>Marca:</strong>{{ $producto->marca}}
        <br>
        <strong>Categoria:</strong>{{ $producto->categoria}}
        <br>
        <strong>Precio:</strong>{{ $producto->precio}}&nbsp;Bs.
        <br>
        <strong>Cantidad Disponible:</strong>{{ $producto->cantidad}}
        <br>
        <strong>Descripcion:</strong>{{ $producto->descripcion}}
        <br>
      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a type="button" class="btn  btn-primary waves-effect" data-dismiss="modal">Ok</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>