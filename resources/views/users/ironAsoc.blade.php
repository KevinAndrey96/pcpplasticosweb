@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Ferreteros asociados
        </div>
        <div class="card-body">
            <div class="row justify-content-center" >
                <div class="col-auto mt-5">
                    <table class="table table-bordered table-responsive" style="margin:0px auto !important;" id="datatable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>País</th>
                                <th>Ciudad</th>
                                <th>Nombre del establecimiento</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user) 
                                @if ($user != null)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->country }}</td>
                                    <td>{{ $user->city }}</td>
                                    <td>{{ $user->establishment_name }}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection