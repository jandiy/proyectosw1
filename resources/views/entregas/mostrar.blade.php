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
                

				<div id="map" style="width:100%;height:400px;"></div>
<?php


$map="'map'";

echo '<script>
      var map;';

echo  'var m={lat: '.$cart->latitud.', lng: '.$cart->longitud.'};
      function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();

        map = new google.maps.Map(document.getElementById( ';
echo $map;
echo '), {
  zoom: 15,
          center: m
          
        });';
echo 'var infoWindow = new google.maps.InfoWindow();
        var pos;
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            function(position) {
              pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };

              infoWindow.setPosition(pos);
              infoWindow.setContent("Location found.");
              infoWindow.open(map);
              map.setCenter(pos);

              directionsDisplay.setMap(map);

              directionsService.route(
                {
                  origin: new google.maps.LatLng(
                    position.coords.latitude,
                    position.coords.longitude
                  ),
                  destination: new google.maps.LatLng('.$cart->latitud.','.$cart->longitud.'),
                  travelMode: "DRIVING"
                },
                function(response, status) {
                  if (status === "OK") {
                    directionsDisplay.setDirections(response);
                  } else {
                    window.alert("Directions request failed due to " + status);
                  }
                }
              );
            },
            function() {
              handleLocationError(true, infoWindow, map.getCenter());
            }
          );
        } else {
          
          handleLocationError(false, infoWindow, map.getCenter());
        }';

echo '}';
				echo "</script>";










?>
				
        <script
      async
      defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfqddk6NK_yUfmF6m6ovYMPGdTWhzAGVc&callback=initMap"
    ></script>
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