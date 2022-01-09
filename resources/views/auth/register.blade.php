<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PCP</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/dash/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body style="background: white;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">

                    <div class="col-lg-12" style="background: url('/assets/images/registro-fondo.jpg')">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h3 text-white-1000 mb-5" style="color:white;">Registro de Ferreteros</h1>
                            </div>
                            <div class="justify-content-center">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6" >
                                        <label for="name" style="color:white; display:inline-block;">{{ __('Nombre') }}</label>
                                            <input id="name" placeholder="Escribe tu nombre" type="text" class="form-control @error('name') is-invalid @enderror" style="border-radius:20px;" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label for="email" style="color:white; display:inline-block;">{{ __('Correo') }}</label>
                                        <input id="email" placeholder="Escribe tu correo" type="email" class="form-control @error('email') is-invalid @enderror" style="border-radius:20px;" name="email" value="{{ old('name') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" >
                                        <label for="name" style="color:white; display:inline-block;">{{ __('Tipo de documento') }}</label>
                                        <select class="form-control" name="document_type">
                                            <option value="CC">CC</option>
                                            <option value="TI">TI</option>
                                            <option value="NIT">NIT</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label for="email" style="color:white; display:inline-block;">{{ __('Documento') }}</label>
                                        <input id="document_number" placeholder="Digita tu número de documento" type="number" class="form-control @error('email') is-invalid @enderror" style="border-radius:20px;" name="document_number" value="{{ old('document_number') }}" required autocomplete="document_number">
                                        @error('document_number')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="phone"  style="color:white; display:inline-block;">{{ __('Teléfono') }}</label>
                                            <input class="form-control @error('phone') is-invalid @enderror" placeholder="Escribe tu teléfono" style="border-radius:20px;" type="text" name="phone" id="phone"></input>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="country" style="color:white; display:inline-block;">{{ __('País') }}</label>

                                                <select class="form-control" name="country">
                                                    <option value="Colombia" selected>Colombia</option>
                                                    <option value="Peru">Perú</option>
                                                    <option value="Mexico">México</option>
                                                </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="city" style="color:white; display:inline-block;">{{ __('Ciudad') }}</label>
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="Escribe tu ciudad" style="border-radius:20px;" name="city" required autocomplete="city">
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4" style="">
                                        <label for="establishment_name" class="form-label text-md-right" style="color:white;">{{ __('Nombre del establecimiento') }}</label>
                                        <div class="">
                                            <input id="establishment_name" placeholder="Escribe el nombre de tu establecimiento" type="text" class="form-control @error('establishment_name') is-invalid @enderror" style="border-radius:20px;" name="establishment_name" required autocomplete="establishment_name">
                                            @error('establishment_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4" >
                                        <label for="password" class="form-label text-md-right" style="color:white;">{{ __('Contraseña') }}</label>

                                        <div class="">
                                            <input id="password" type="password" placeholder="Escribe tu contraseña" class="form-control @error('password') is-invalid @enderror" style="border-radius:20px;" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4" >
                                        <label for="password-confirm" class="form-label text-md-right" style="color:white;">{{ __('Confirmar contraseña') }}</label>
                                        <div class="">
                                            <input id="password-confirm" placeholder="Repite tu contraseña" type="password" class="form-control" style="border-radius:20px;" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-md-5 col-md-2" style="margin-top:5%">
                                        <button type="submit" class="btn btn-info form-control">
                                            {{ __('Registrarse') }}
                                        </button>
                                    </div>
                                </div>

                        </form>
                    </div>
            <hr>
                    </div>
        <div class="text-center">

        </div>
        <div class="text-center">

        </div>
    </div>
</div>
</div>
</div>
</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
