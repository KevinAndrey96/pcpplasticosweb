@extends('layouts.dashboard')
@section('content')


@if(count($errors)>0)

  <div class="alert alert-danger" role="alert">
    <ul>

       @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach

    </ul>
  </div>

@endif

<div class="card">
    <div class="card-header">

        Productos

    </div>


    <div class="card-body">
        @if(Auth::user()->role == 'Ferretero')
        <div id="message-iron">
            <b>
                <p class="text-center" style="background-color:#EC7063; color: white; text-align:justify; width:100%; padding:10px; border-radius:10px;">
                    Señor Ferretero recuerde que estos precios son precios de referencia y no incluyen impuestos,
                    el valor de su pedido puede aumentar o disminuir de acuerdo a la negociación directa con el distribuidor de su preferencia. El distribuidor le
                    enviara en breve una cotización con el valor final de su transferencia para que sea aprobada por usted.
                </p>
            </b>
            <b>
                <p class="text-center" style="background-color:#18C8DA; color: white; text-align:justify; width:100%; padding:10px; border-radius:10px;">
                    Por favor seleccione cantidades y distribuidor de preferencia
                </p>
            </b>
        </div>
        @endif
        @if(Auth::user()->role == 'Distribuidor')
                <b>
                    <p class="text-center" style="background-color:#18C8DA; color: white; text-align:justify; width:100%; padding:10px; border-radius:10px;">
                        Por favor seleccione cantidades
                    </p>
                </b>
            @endif

        <div class="row justify-content-center" >

            <div class="col-auto mt-5">
                <form method="POST" action="{{ route('bill') }}">
                    @csrf
                    {{ method_field('POST') }}
                    <!--<input type="hidden" name="dataProduct" value="{{json_encode($dataProduct)}}">-->
                    <table class="table table-bordered table-responsive justify-content-center text-center" id="datatable" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    @if(Auth::user()->role == 'Ferretero')
                                    <th>Precio sugerido</th>
                                    @else
                                    <th>Precio</th>
                                    @endif
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($dataProduct as $product)

                                <tr>
                                    <td class="text-align:center;"><a class="product" href="{{ $product->image }}"><img class="img-thumbnail" src="{{ $product->image }}" width="70x" height="70px" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';"></a></td>
                                    <td><a href="{{ $product->url }}" target="_blank">{{$product->name}}</a></td>
                                    <td>${{number_format($product->price, 2, ',', '.')}}</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control" type="number" min="1" name="quantity" id="quantity{{ $product->id }}" style="width:80px; text-align:center; margin:0px auto;"  onclick="getQuantity({{ $product->id }}, {{ $product->price }})" required>
                                        </div>
                                    </td>


                                </tr>
                                @endforeach

                            </tbody>

                    </table>
                    <br/>
                    <div id="divTotal" style="display: inline-block; float:right; margin-top:10px; margin-bottom:20px;" >
                        <label><h5>Total sugerido antes de impuestos:</h5></label>
                        <h4><span id="total"></span></h4>
                    </div>
                    <div style="clear:both;"></div>
                    @if(Auth::user()->role=='Ferretero')

                    <div id="divDistri"style="display: inline-block; float:left;" class="row col-md-12">

                        <div class="form-group">
                            <label for="seller_id">Distribuidores de {{ strtoupper(Auth::user()->city) }}</label>
                            <select class="form-control" name="seller_id" id="seller_id" >

                                @foreach($distributors as $distributor )

                                    <option value="{{ $distributor->id }}">{{ $distributor->establishment_name }}</option>

                                @endforeach


                            </select>

                        </div>
                    </div>
                    <div style="clear:both;"></div>

                    @endif


                    <div id="addressComent" style="display: inline-block; float:left;" class="row col-md-12">
                        <input class="form-control" type="hidden" name="city" value="{{ Auth::user()->city }}" required>

                        <div class="form-group">
                            <label for="address">Dirección de despacho:</label>
                            <input class="form-control" placeholder="Escribe tu dirección..." type="text" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="coment">Comentario:</label>
                            <textarea  class="form-control" placeholder="Escribe tu comentario..." name="coment" ></textarea>
                        </div>
                    </div>



                    <div style="clear:both;"></div>
                    <input type="hidden" name="cart1" id="cart1">
                    <input type="hidden" name="cart2" id="cart2">

                    <input type="hidden" name="_method" value="POST">
                    <div>
                        <!--<a class="btn btn-danger" href="/orders" style="margin-top:30px; float:left; display:inline-block;">Atrás</a>-->
                        <input type="submit" class="btn btn-info" width="300px" style="margin-top:30px; float:right; display:inline-block;" value="Solicitar transferencia"
                               @if(Auth::user()->role == 'Ferretero') onclick="return confirm('El distribuidor de su preferencia lo contactará para completar su transferencia. Gracias por usar la app PCP.');" @endif>
                        <div style="clear:both;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var quantities = new Array();
        var ids = new Array();
        var prices = new Array();
        const formatterDolar = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
         })

        function getQuantity(productID, price)
        {
            var inputQuantity = document.getElementById('quantity'+productID);
            var cart1 = document.getElementById('cart1');
            var cart2 = document.getElementById('cart2');
            var spanTotal = document.getElementById('total');
            var total = 0;

            inputQuantity.addEventListener("blur", function(){
                if (! ids.includes(productID))
                {
                    ids.push(productID);
                    index = ids.indexOf(productID);
                    quantities[index] = inputQuantity.value;
                    prices[index] = parseFloat(price);
                } else {
                    index = ids.indexOf(productID);
                    quantities[index] = inputQuantity.value;
                    prices[index] = parseFloat(price);
                }

                for(i=0; i<prices.length; i++){
                    total += quantities[i]*prices[i];
                }


                cart1.value = quantities;
                cart2.value = ids;
                console.log(total);
                spanTotal.innerHTML = formatterDolar.format(total);








            });
        }



    </script>
@endsection
