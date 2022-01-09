@extends('layouts.dashboard')
@section('content')





<div class="row">
    @if(Auth::user()->role=='Distribuidor')
       <img class="img-responsive" src="/assets/images/distri_banner.png" width="100%" height="auto" style="margin:auto;">
       <div id="acciones" style="margin: 0px auto; margin-top:40px; width:48%;">
          <h1 class="" style="font-family: Arial, Helvetica, sans-serif; text-align:center; color:#1F5AA5;">Bienvenido Distribuidor PCP!<h1>
          <h1 style="font-family: Arial, Helvetica, sans-serif; text-align:center; color:#1F5AA5; font-weight: bolder;">¿Qué desea hacer?</h1>

       </div>
       <div id="imagenes" style="margin: 0px auto; text-align:center; margin-top:40px; width:70%;">
            <div style="display:inline-block;">
               <a href="{{url('/orders')}}" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/Hacer_TransferenciaFERRE.png" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="font-size: 20px">Hacer pedido</p></a>
            </div>
            <div style="display:inline-block;">
               <a href="/showOrders?role=Distribuidor" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/Mis TransferenciasFERRE.png" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="text-decoration: none; font-size: 20px; ">Transferencias asociadas</p></a>
            </div>
            <div style="display:inline-block;">
               <a href="https://nueva.pcpplasticos.co/wp-content/uploads/2021/04/CATALOGO_COLOMBIA.pdf" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/Descargar CatalogoFERRE.png" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="font-size: 20px">Nuestros productos</p></a>
            </div>
            <div style="display:inline-block;">
               <a target="_blank" href="https://logystyca.com/consultarguias" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/operlog.png" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="font-size: 20px">Despacho OperLog</p></a>
            </div>
            <div style="display:inline-block;">
               <a target="_blank" href="https://pcpplasticos.co/capacitaciones/" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/capacitaciones.PNG" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="font-size: 20px">Quiero capacitarme</p></a>
            </div>
            <div style="display:inline-block;">
               <a target="_blank" href="https://sistemas.surenvios.com.co/consulta/consulta.aspx" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/gopack.png" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="font-size: 20px">Despacho Surenvios</p></a>
            </div>
          </div>


    @elseif (Auth::user()->role == 'Ferretero') 
       <img class="img-responsive" src="/assets/images/ferretero_banner.png" width="100%" height="auto" style="margin:auto;">
       <div id="acciones" style="margin: 0px auto; margin-top:40px; width:48%;">
          <h1 class="" style="font-family: Arial; text-align:center; color:#1F5AA5; font-weight: bolder;">Bienvenido Ferretero PCP!<h1>
          <h1 style="font-family: Arial, Helvetica, sans-serif; text-align:center; color:#1F5AA5;">¿Qué desea hacer?</h1>
       </div>
       <div id="imagenes" style="margin: 0px auto; text-align:center; margin-top:40px; width:70%;">
            <div style="display:inline-block;">
               <a href="{{url('/orders')}}" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/Hacer_TransferenciaFERRE.png" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="font-size: 20px">Hacer transferencia</p></a>
            </div>
            <div style="display:inline-block;">
               <a href="/myOrders" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/Mis TransferenciasFERRE.png" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="font-size: 20px">Mis transferencias</p></a>
            </div>
            <div style="display:inline-block;">
               <a href="https://nueva.pcpplasticos.co/wp-content/uploads/2021/04/CATALOGO_COLOMBIA.pdf" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/Descargar CatalogoFERRE.png" style="display:inline-block; margin:3px; width:200px; height:200px;"><p style="font-size: 20px">Descargar catálogo</p></a>
            </div>
            <!--<div style="display:inline-block;">
               <a target="_blank" href="https://pcpplasticos.co/capacitaciones/" style="text-decoration: none;"><img class="img-responsive" src="/assets/images/botones_home/capacitaciones_ferre.PNG" style="display:inline-block; margin:3px; width:165px; height:165px;"><p>Capacitaciones</p></a>
            </div>-->
         </div>
    @endif
    <img class="img-responsive" src="/assets/images/footer.jpg" width="100%" height="auto" style="display:block; margin-left:auto; margin-right:auto; margin-top:150px;">



   </div>
@endsection

