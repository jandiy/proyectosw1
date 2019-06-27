@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Carrito</h1>
            </div>
            <div class="pull-right">
                  <a class="btn btn-app" href="{{ route('payments.create') }}"><i class="fa  fa-user-plus"></i>
                   Comprar
                </a>

            </div>
        </div>
    </div>
     @include('carts.compra')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example1" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Opcion</th>
            <th>Nombre del Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
       
           @foreach ($carts as $key => $cart) 
            <tr>
                 <td>
                   
                   <a class="btn btn-danger"   href="" data-target="#modal-delete-{{$cart->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                       
                    </a>
                   
                </td>
                <td>{{ $cart->nombre }}</td>
                <td>{{ $cart->precio }}</td>
                <td>{{ $cart->cantidad }}</td>
                <td>{{ $cart->subtotal }}</td>
               
            </tr>
            @include('carts.modal')
        @endforeach
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <?php 
                 $i=0;
                 foreach ($carts as $key => $cart) {
                           ;
                            $i=$i+$cart->subtotal*1;
                            
                           
                  }
                  echo "<td>".$i."</td>" ?>
            </tr>
        </tfoot>
    </table>
</div>
@endsection