@extends('layouts.admin')

@section('content')
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>

<!-- <script
      src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
      type="text/javascript"
    ></script> -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereumjs/browser-builds/dist/ethereumjs-tx/ethereumjs-tx-1.3.3.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>



<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;" >
    <div class="pull-left" >            
        <a class="btn btn-primary glyphicon glyphicon-arrow-left" 
        style="font-size:20px"href="{{ route('carts.index') }}"></a>
    </div>
    <br/> 
    <br/>
    
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 >Confirmar Datos</h1>
        </div>
    </div>       
        
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="name" disabled placeholder="{{$user->name}}" class="form-control">
             
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => $user->email,'class' => 'form-control', 'disabled' => 'true')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Direccion:</strong>
                {!! Form::text('direccion', null, array('placeholder' => $user->direccion,'class' => 'form-control', 'disabled' => 'true')) !!}
            </div>
        </div>


        <div class="col-12 mt-2 mb-2">
                    <div id="map" style="width:100%;height:400px;"></div> 
                     
                </div>
    </div>
        


<script>
////////////////////// codigo del MAPA ///////////NO TOCAR
var marker;          //variable del marcador
//coordenadas obtenidas con la geolocalización

//Funcion principal
var coords = {};    //coordenadas obtenidas con la geolocalización

//Funcion principal
initMap = function ()
{
    //usamos la API para geolocalizar el usuario
            coords =  {
                lng: -63.18224981914062,
                lat: -17.782958778663453
            };
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
}
function setMapa (coords1,coords2 )
{
    //Se crea una nueva instancia del objeto mapa
    var map = new google.maps.Map(document.getElementById('map'),
        {
            zoom: 15,
            center:new google.maps.LatLng(coords.lat,coords.lng),

        });
    //Creamos el marcador en el mapa con sus propiedades
    //para nuestro obetivo tenemos que poner el atributo draggable en true
    //position pondremos las mismas coordenas que obtuvimos en la geolocalización
    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coords.lat,coords.lng),
    });
    //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica
    //cuando el usuario a soltado el marcador
    marker.addListener('click', toggleBounce);
    marker.addListener( 'dragend', function (event)
    {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("coords1").value = this.getPosition().lat();
        document.getElementById("coords2").value = this.getPosition().lng();
    });
}
//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}
//////////////////// codigo del MAPA ///////////NO TOCAR
</script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofod0Bp0frLcLHVLxuacn0QBXqVyJ7lc&callback=myMap" type="text/javascript"></script>  -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofod0Bp0frLcLHVLxuacn0QBXqVyJ7lc&callback=initMap"
    async defer></script>






       

       
        <div class="row">
          
          
              <div class="col-md-4 col-md-offset-4">
                  <h1 >Metodo de Pago</h1>
              </div>        
           


          <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <h3>Total:{{$total}}&nbsp;Bs.</h3>
                <p><input type="hidden" id="amount" value="{{$total}}"> </p>
                <p>Equivalente en Ether:{{$ether}} </p>
                           
            </div>
        </div>  
      </div>
        

 <div class="row">

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Ethereum')">Ethereum</button>
  <button class="tablinks" onclick="openCity(event, 'Token-RCP-20')">Token-RCP-20</button>  
</div>

<div id="Ethereum" class="tabcontent">
  <h3>Ethereum</h3>      

  <p>Introduzca sus datos.</p>
  <div class="form-group">
                    <strong>Direccion de cuenta Ethereum:</strong>
                    {!! Form::text('cuentaether',null, array('id'=>'direther','placeholder' => '0x0000000','class' => 'form-control')) !!}                    
                </div> 
  <button id="confirmarAccEthereum">Confirmar</button>

  <br/>
  <br/>
  <label  style="color:green;"><i class="fa fa-check"></i> Input with success</label>
  <p>You can follow your transaction at <a href="https://ropsten.etherscan.io">https://ropsten.etherscan.io/</a></p>


</div>




<div id="myModal" class="modal" aria-hidden="true"
     role="dialog">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h5>Ropsten Test Network</h5>
      <h3>Interaccion de Contrato</h3>
    
    </div>
    {!! Form::open(array('route' => 'carts.store','method'=>'POST')) !!}
    <div class="modal-body">
    
    
    
    
      <strong>Tu Balance:</strong>
      <p id="mibalance">
        
      </p>
      
      <p><b>Detalle:</b></p>
      <p>Precio del gas por transaccion: 0.021000000<img src="{{ asset('imagenes/logo/eth.svg') }}" style="height:26px;"></p>
      <p>Precio total del carrito: {{$ether}} <img src="{{ asset('imagenes/logo/eth.svg') }}" style="height:26px;"></p>
      <br/><br/>

      <h1><img src="{{ asset('imagenes/logo/eth.svg') }}" style="height:26px;">Total: {{$gas}}</h1>
      <input type="hidden" id="gas" value="{{$gas}}">

      <div style="display: none;">

         <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Latitude:</strong>
                  {!! Form::text('latitude', null, array('class' => 'form-control', 'id'=>'coords1')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Longitude:</strong>
                      {!! Form::text('longitude', null, array('class' => 'form-control', 'id'=>'coords2')) !!}
                  </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <input type="text" id="txtHash" name="txtHash">
                  </div>
           </div>
          
        </div>
      
            
                
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <p style="text-align:left;"><strong >Llave:</strong></p>
          {!! Form::password('llavesecreta', array('id'=>'llave','placeholder' => 'Llave','class' => 'form-control')) !!}
        </div>
    </div>
     
    <button class="btn btn-success" type="button" id="verificar">Verificar</button>
    <div class="modal-footer">
      <button class="btn btn-primary" id="cerrarModal" style="color: black; background-color:#e7e7e7;">Cancelar</button>
      <button type="sumbit" class="btn btn-primary">Confirmar</button>
    </div>
    {!! Form::close() !!}
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("confirmarAccEthereum");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {


        var amt = $("#amount").val();
        var total = $("#gas").val();
        const direther = $("#direther").val(); 
        const llave = $("#llave").val();  

        const web3 = new Web3(
          "https://ropsten.infura.io/v3/67f26f9a076240a7b843f92e42c8bd38"
        );
        var balance = web3.eth.getBalance(direther).then(bal => { 
          console.log(bal);

           document.getElementById("mibalance").innerHTML = web3.utils.fromWei(bal, "ether"); });
        //console.log(balance);

        

  modal.style.display = "block";
  // pasamos la direccion al modal visualmente 
  
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
$("#cerrarModal").click(function() {
    modal.style.display = "none";
});
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


</script>







<div id="Token-RCP-20" class="tabcontent">
  <h3>Token-RCP-20</h3>
  <p>Introduzca sus datos</p>
  <div class="form-group">
                    <strong>Direccion de cuenta:</strong>
                    {!! Form::text('cuenta',null, array('id'=>'cuenta','placeholder' => '0x0000000','class' => 'form-control')) !!}
                </div>   
  <button>test2</button>
</div>

<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
</script>
    

   
        

        

        



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button id="finalizarPago"type="submit" class="btn btn-primary">Finalizar Pago</button>
        </div>
    </div>







    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
                <button id="withdraw">withdraw</button>
            </div>
        </div> -->
</div>







                

    


      <script>
      var contract;

      
      $("#withdraw").click(function() {
        const web3 = new Web3(
          "https://ropsten.infura.io/v3/67f26f9a076240a7b843f92e42c8bd38"
        );
        var balance = web3.eth.getBalance("0x9148F95b33298Df2db697045cFF36fe04932222e").then(bal => { console.log(bal); });
        
        console.log(balance);




      });
      $("#verificar").click(function() {
  


        var amt = $("#amount").val();
        var total = $("#gas").val();
        const direther = $("#direther").val(); 
        const llave = $("#llave").val();  

        const web3 = new Web3(
          "https://ropsten.infura.io/v3/67f26f9a076240a7b843f92e42c8bd38"
        );
        var balance = web3.eth.getBalance(direther).then(bal => { console.log(bal); });
        console.log(balance);


        // console.log(amt);    
        // console.log(direther);    
        // console.log(llave);    
        
        
        const account1 = "0x9148F95b33298Df2db697045cFF36fe04932222e"; // Your account address 1
        const account2 = "0xA376aB060e050233AC68f3DdE98f9A5FbC7E6353"; // Your account address 2

        const privateKey1 = new ethereumjs.Buffer.Buffer(
            llave,
          "hex"
        );
        const privateKey2 = new ethereumjs.Buffer.Buffer(
          "6DF465E99D4CD1DC6B5563429D454566256584C74BD6B165AB02E5F10640A61E",
          "hex"
        );
        web3.eth.getTransactionCount(direther, (err, txCount) => {
          //   // Build the transaction
          const txObject = {
            nonce: web3.utils.toHex(txCount),
            to: account2,
            value: web3.utils.toHex(web3.utils.toWei(total, "ether")),
            gasLimit: web3.utils.toHex(21000),
            gasPrice: web3.utils.toHex(web3.utils.toWei("1000", "gwei"))
          };

          //   // Sign the transaction
          const tx = new ethereumjs.Tx(txObject);
          tx.sign(privateKey1);
          const serializedTx = tx.serialize().toString("hex");

          const raw = "0x" + serializedTx;

          //   // Broadcast the transaction
          web3.eth.sendSignedTransaction(raw, (err, txHash) => {
            console.log("txHash:", txHash);
             
             document.getElementById("txtHash").value=txHash;

            // Now go check etherscan to see the transaction!
          });
        });

      });
    </script>


    

@endsection

