<div class="modal modal-default fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-mostrar-{{$cart->id}}"
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
                <strong>Cliente:</strong>
                {{ $cart->name }}
                </div>
                <div class="form-group">
                
                
                    @foreach($trans as $key => $t)
                    
                    @if($t->carrito_id == $cart->id)
                    <strong>Transaccion:</strong>
                    <a href="https://ropsten.etherscan.io/tx/{{$t->txtHash}}">Aqui</a>
                    @endif
                    @endforeach
                </div>

                
				<div id="map" style="width:100%;height:400px;"></div>
<?php


$map="'map'";

echo '<script>
      var map;';

echo  'var m={lat:'.$cart->latitud.', lng: '.$cart->longitud.'};
      function initMap() {
        map = new google.maps.Map(document.getElementById( ';
echo $map;
echo '), {
          center: m,

          zoom: 14
        });';

echo 'var marker = new google.maps.Marker({position: m, map: map});}';
				echo "</script>";
/*
function initMap() {
  // The location of Uluru
  lati= document.getElementById("latitud").value.split('_');
  valor =lati[0];
  var latitud= document.getElementById("especial"); 
  console.log(valor);
  lati=lati*1;
  var longi= document.getElementById("longitud");
  longi=longi*1;

  

  var uluru = {lat: lati, lng: longi};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 14, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}


				
				</script>*/
?>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofod0Bp0frLcLHVLxuacn0QBXqVyJ7lc&callback=initMap"></script>
				<div class="form-group">
                
               
                <input type="hidden" id="latitud" name="latitud"  value="{{$cart->latitud}}_{{$cart->longitud}}">
               
                <br>
                
                </div>
                <input type="hidden" id="longitud" name="longitud" value="{{$cart->longitud}}">
                <?php

                foreach ($detalles as $key => $value) {

                    if($value->id == $cart->id){

                           
                            echo "<strong>Producto:</strong>&nbsp;".$value->producto."&nbsp;";
                            echo "<strong>Marca:</strong>&nbsp;".$value->marca."&nbsp;";
                            echo "<strong>Precio:</strong>&nbsp;".$value->precio."&nbsp;";
                            echo "<strong>Cant:</strong>&nbsp;".$value->cantidad."&nbsp;";
                            echo "<strong>Sub:</strong>&nbsp;".$value->subtotal."</br>";
                             
                            
                           
                    }
                }
                
                ?>
                 
                <div class="form-group">
                	<strong>Total:</strong>
                	{{ $cart->total}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>

        </div>

    </div>

</div>