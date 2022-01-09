@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            @if(Auth::user()->role == 'Distribuidor' )
            Detalle de mi pedido
            @else
            Detalle de mi transferencia
            @endif
        </div>
        <div class="card-body">
            <div class="row justify-content-center" >
                <div class="col-auto mt-5 text-center">
                    <table class="table table-bordered table-responsive"  style="margin:0px auto !important" id="datatable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Divisa</th>
                                <th>Precio</th>
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
                            </tr>
                            <div style="display:none;"> {{$i++}} </div>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
