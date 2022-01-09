@extends('layouts.dashboard')
@section('content')

@if(Session::has('messageSuccess'))


<div class="alert alert-success" role="alert">

  <p style="font-size: 20px">{{ Session::get('messageSuccess') }}</p>

</div>



@endif

<div class="card">
    <div class="card-header">

        Productos

    </div>


    <div class="card-body">

        @if(Auth::user()->role == "Ferretero")
                    <div id="message-iron" style="margin-top:20px;">
                        <b>
                            <p class="text-center" style="background-color:#EC7063; color: white; text-align:justify; width:100%; padding:10px; border-radius:10px;">
                            Señor Ferretero recuerde que estos precios son precios de referencia y no incluyen impuestos,
                            el valor de su pedido puede aumentar o disminuir de acuerdo a la
                            negociación directa con el distribuidor de su preferencia. El distribuidor le
                            enviara en breve una cotización con el valor final de su transferencia para que sea
                            aprobada por usted.
                            </p>
                        </b>
                    </div>
        @else
            <b>
                <p class="text-center" style="background-color:#EC7063; color: white; text-align:justify; width:100%; padding:10px; border-radius:10px;">
                    Señor Distribuidor recuerde que estos precios son precios de referencia y no incluyen impuestos.
                </p>
            </b>
        @endif
            <b>
                <p class="text-center" style="background-color:#18C8DA; color: white; text-align:justify; width:100%; padding:10px; border-radius:10px;">
                    A continuación se encuentran nuestros productos, por favor seleccione los que desea adquirir
                </p>
            </b>
        <div class="row justify-content-center" >

            <div class="col-auto mt-5">
                <form action="{{ url('/orderProducts') }}" method="POST">
                    @csrf

                    <table class="table table-bordered table-responsive justify-content-center text-center" id="datatable" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Selección</th>
                                    <th>Imagen</th>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    @if(Auth::user()->role == 'Ferretero')
                                    <th>Precio sugerido</th>
                                    @else
                                    <th>Precio</th>
                                    @endif
                                    <th>Referencia</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="form-group" >

                                            <input type="checkbox" class="form-check-input" id="customCheck{{ $product->id }}" style=" margin: 0px auto;" name="customCheck[]" value="{{ $product->id }}" onclick="getIDS({{ $product->id }})">
                                            <label class="form-check-label" for="customCheck[]"></label>

                                        </div>
                                    </td>
                                    <td style="text-align:center;"><a class="product" href="{{ $product->image }}"><img class="img-thumbnail" src="{{ $product->image }}" width="70x" height="70px" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';"></a></td>
                                    <td>{{$product->id}}</td>
                                    <td><a href="{{ $product->url }}" target="_blank">{{$product->name}}</a></td>
                                    <td>${{number_format($product->price, 2, ',', '.')}}</td>
                                    <td>{{$product->code}}</td>

                                </tr>
                                @endforeach


                            </form>
                            </tbody>

                    </table>

                    <!--EMMET-->

                    <input type="hidden" name="cart" id="cart">
                    <input type="submit" id="form-continue" class="btn btn-info" width="300px" style="margin-top:40px; float:right;"  onclick="return window.confirm('Recuerde que continuará su transferencia eligiendo el número de cantidades que necesita por cada uno de los productos seleccionados aquí, si da click en aceptar y olvida algún producto puede sin problema solicitarlo en una nueva transferencia.')"  value="Continuar al carrito">
                </form>
            </div>

        </div>
        </div>
        </div>

        <script type="text/javascript">
            var ids = new Array();
            function getIDS(productID)
            {
                var box = document.getElementById("customCheck"+productID);
                var cart = document.getElementById("cart");
                if (box.checked == true) {
                    ids.push(productID);
                } else {
                    var i = ids.indexOf(productID);
                    if ( i !== -1 ) {
                        ids.splice( i, 1 );
                    }
                }
                var selections = Object.assign({},ids);
                cart.value = ids;
            }

        </script>


@endsection
