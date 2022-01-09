@extends('layouts.dashboard')
@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
       Detalle de la transferencia
    </div>
    <div class="card-body">

        <div class="row justify-content-center" >

            <div class="col-auto mt-5 text-center">
               @if(Auth::user()->role == "Distribuidor")
                <form method="POST" action="{{ url('/quotation') }}">
                @csrf
               @endif
                <table class="table table-bordered table-responsive"  style="margin:0px auto !important" id="datatable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Divisa</th>
                            <th>Precio sugerido</th>
                            @if(Auth::user()->role == 'Distribuidor')
                            <th>Precio final</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                    <div style="display:none;"> {{$i=0}} </div>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $products[$i]->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->currency }}</td>
                                <td>${{number_format($order->price , 2, ',', '.')}}</td>
                                @if(Auth::user()->role == 'Distribuidor')
                                <td><div class="form-group"><input class="form-control"  style="width:150px !important;" type="number" name="sugprice" id="sugprice{{ $products[$i]->id }}" min="1" onclick="priceChange({{ $products[$i]->id }})" required></div></td>
                                @endif

                            </tr>
                            <div style="display:none;"> {{$i++}} </div>

                        @endforeach


                    </tbody>

                </table>

                @if(Auth::user()->role == "Distribuidor")
                        <input type="hidden" name="idOrder" value="{{ $idOrder }}">
                        <input type="hidden" name="prices" id="prices">
                        <input type="hidden" name="ids" id="ids">
                    <input type="submit" class="form-control btn btn-success" style="display:block; float:right; margin-top:30px;" value="Generar cotización">
                    <div style="clear:both;"></div>
                @endif
            </form>
            <form method="POST" action="/downloadPDF">
                @csrf
                <input type="hidden" name="id_order" value="{{ $idOrder }}">
                @if($updaOrder->created_at != $updaOrder->updated_at || Auth::user()->role == 'Administrador')
                    <input type="submit" class="form-control btn btn-danger" style="display:block; float:right !important; margin-top:30px;" value="Descargar cotización">
                @endif
                <div style="clear:both;"></div>
            </form>
            </div>



        </div>
            <form action="{{ url('/changeStatus?id=').$id}}" method="POST">
                @csrf

                <div class="form-group justify-content-center" style="margin-top:50px;" >
                    <!--<label for="status" style="margin:0px auto !important;">Estado: </label>-->
                    <select class="form-control text-center
                    " style="margin-bottom:30px; width:300px; margin:0px auto;" name="status">
                        <option value="{{ $status }}" selected disabled>{{ $status}}</option>
                        <option style="background-color:#51C70E; color:white;" value="Iniciado">Iniciado</option>
                        <option style="background-color:#C7940E; color:white;" value="En proceso">En proceso</option>
                        <option style="background-color:#C70E0E; color:white;" value="Cancelado">Cancelado</option>

                    </select>
                </div>

                <input type="submit" style="display:block; margin:0px auto;" class="btn btn-info" value="Cambiar estado">
            </form>


            </div>
</div>
<script type="text/javascript">

    var prices = new Array();
    var ids = new Array();


    function priceChange(productID){

        var inputPrice = document.getElementById('sugprice'+productID);
        var inputPrices = document.getElementById('prices');
        var inputIDS = document.getElementById('ids');

        inputPrice.addEventListener('blur',function(){

            if (! ids.includes(productID))
            {
                ids.push(productID);
                index = ids.indexOf(productID);
                prices[index] = inputPrice.value;
            } else {
                index = ids.indexOf(productID);
                prices[index] = inputPrice.value;
            }

            inputPrices.value = prices;
            inputIDS.value = ids;


        });
    }

</script>


@endsection
