<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:8.0pt;
	margin-left:0cm;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
.MsoChpDefault
	{font-family:"Calibri",sans-serif;}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:72.0pt 72.0pt 72.0pt 72.0pt;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=ES-CO style='word-wrap:break-word'>

<div class=WordSection1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse'>
 <tr style='height:34.5pt'>
  <td width=200 rowspan=2 valign=top style='width:150.0pt;border:solid white 1.0pt;
  border-bottom:none;padding:0cm 5.4pt 0cm 5.4pt;height:34.5pt'>
  <p class=MsoNormal>
  <span lang=ES>
  <img width=139 height=120 id="Imagen 1671542093"
  @if($sellerUser->role == 'Distribuidor')
  src="https://app.pcpplasticos.co/storage/{{ $sellerUser->image }}"
  @else
  src="https://app.pcpplasticos.co/assets/images/pcp.png"
  @endif
  >
  </span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;border:solid white 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:34.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><b><span
  lang=es style='font-size:12.0pt;line-height:107%;font-family:"Arial",sans-serif'>V-F002</span></b></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:82%'><span
  lang=es style='font-size:9.0pt;line-height:82%;font-family:"Arial",sans-serif'>REV.1
  29/03/2016</span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;border:solid white 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:34.5pt'>
  <p class=MsoNormal style='line-height:107%'><b><span lang=es
  style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>FECHA
  COTIZACIÓN: </span></b><span lang=es style='font-size:9.0pt;line-height:107%;
  font-family:"Arial",sans-serif'>{{ $sDate }}</span></p>
  <p class=MsoNormal style='line-height:107%'><span lang=ES style='font-size:
  9.0pt;line-height:107%;font-family:"Arial",sans-serif'> </span></p>
  </td>
 </tr>
 <tr style='height:24.0pt'>
  <td width=200 valign=top style='width:150.0pt;border-top:none;border-left:
  none;border-bottom:solid white 1.0pt;border-right:solid white 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:24.0pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><b><u><span
  lang=es style='font-size:12.0pt;line-height:107%;font-family:"Arial",sans-serif'>COTIZACIÓN
  No. 200039</span></u></b></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;border-top:none;border-left:
  none;border-bottom:solid white 1.0pt;border-right:solid white 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:24.0pt'>
  <p class=MsoNormal style='line-height:107%'><b><span lang=es
  style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'> </span></b><span lang=es style='font-size:9.0pt;line-height:
  107%;font-family:"Arial",sans-serif'></span></p>
  </td>
 </tr>
 <tr style='height:21.0pt'>
  <td width=200 valign=top style='width:150.0pt;border:solid white 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:21.0pt'>
  <p class=MsoNormal style='line-height:107%'><span lang=ES style='font-family:
  "Arial",sans-serif'> </span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;border-top:none;border-left:
  none;border-bottom:solid white 1.0pt;border-right:solid white 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:21.0pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><b><span
  lang=ES style='font-size:12.0pt;line-height:107%;font-family:"Arial",sans-serif'> </span></b></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;border-top:none;border-left:
  none;border-bottom:solid white 1.0pt;border-right:solid white 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:21.0pt'>
  <p class=MsoNormal style='line-height:107%'><b><span lang=es
  style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>VÁLIDO
  HASTA: </span></b><span lang=es style='font-size:9.0pt;
  line-height:107%;font-family:"Arial",sans-serif'>{{ $sDate }}</span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='line-height:115%'><span lang=ES> </span></p>
@if(Auth::user()->role == 'Administrador')
<p class=MsoNormal align=center style='text-align:center;line-height:115%'><b><span
lang=es style='font-size:9.0pt;line-height:115%;font-family:"Arial",sans-serif; text-transform: uppercase'>PARTES
Y COMPLEMENTOS PLÁSTICOS S A S NIT 800027765-5 DIRECCIÓN VIA CERRITOS LA
VIRGINIA KM 3 COSTADO IZQUIERDO (Pereira - CO) PBX: (1) 742 8373</span></b></p>
@else
<p class=MsoNormal align=center style='text-align:center;line-height:115%'><b><span
    lang=es style='font-size:9.0pt;line-height:115%;font-family:"Arial",sans-serif; text-transform: uppercase'>{{ $sellerUser->establishment_name}} NIT {{ $sellerUser->document_number }} PBX: {{ $sellerUser->phone }}</span></b></p>
@endif
<p class=MsoNormal align=center style='text-align:center;line-height:105%'><b><span
lang=es style='font-size:13.0pt;line-height:105%;font-family:"Arial",sans-serif'>IDENTIFICACIÓN
DEL CLIENTE</span></b></p>
<hr>

<p class=MsoNormal style='text-align:justify;line-height:107%'><b><span
lang=ES style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'> </span></b></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='margin-left:12.0pt;border-collapse:collapse'>
 <tr>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify;line-height:107%'><b><span
  lang=es style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>NOMBRE:
  </span></b><span lang=es style='font-size:9.0pt;line-height:107%;font-family:
  "Arial",sans-serif'>{{ $user->establishment_name }}</span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify;line-height:107%'><b><span
  lang=es style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>NIT
  O CC:</span></b><span lang=es style='font-size:9.0pt;line-height:107%;
  font-family:"Arial",sans-serif'> {{ $user->document_number }}</span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='line-height:107%'><b><span lang=es
  style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>TELÉFONO:
  </span></b><span lang=es style='font-size:9.0pt;line-height:107%;font-family:
  "Arial",sans-serif'>{{ $user->phone }}</span></p>
  </td>
 </tr>
 <tr style='height:24.0pt'>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:24.0pt'>
  <p class=MsoNormal style='line-height:107%'><b><span lang=es
  style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>CIUDAD: </span></b><span lang=es style='font-size:8.0pt;line-height:107%;
  font-family:"Arial",sans-serif'>{{ $order->city}}</span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:24.0pt'>
  <p class=MsoNormal style='text-align:justify;line-height:107%'><b><span
  lang=es style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>DIRECCIÓN
  DE ENTREGA: </span></b><span lang=es style='font-size:8.0pt;line-height:107%;
  font-family:"Arial",sans-serif'>{{ $order->delivery_address }}</span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:24.0pt'>
  <p class=MsoNormal style='text-align:justify;line-height:50%'><b><span
  lang=ES style='font-size:9.0pt;line-height:50%;font-family:"Arial",sans-serif'> </span></b></p>
  <p class=MsoNormal style='text-align:justify;line-height:50%'><span lang=ES> </span></p>
  </td>
 </tr>
 <tr>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='line-height:107%'><b><span lang=es
  style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>PEDIDO:</span></b><span
  lang=es style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>
  {{ $order->id }}</span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify;line-height:107%'><b><span
  lang=es style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>ORDEN
  COMPRA: </span></b><span lang=es style='font-size:9.0pt;line-height:107%;
  font-family:"Arial",sans-serif'>{{ $order->id }}</span></p>
  </td>
  <td width=200 valign=top style='width:150.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify;line-height:107%'><b><span
  lang=es style='font-size:9.0pt;line-height:107%;font-family:"Arial",sans-serif'>VENDEDOR:
  </span></b><span lang=es style='font-size:9.0pt;line-height:107%;font-family:
  "Arial",sans-serif'>{{ $sellerUser->establishment_name }}</span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='text-align:justify;line-height:105%'><span lang=es
style='font-size:8.0pt;line-height:105%;font-family:"Arial",sans-serif'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='margin-left:12.0pt;border-collapse:collapse'>
 <tr style='height:16.5pt'>
  <td width=59 valign=top style='width:44.25pt;border:solid #999999 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><b><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>REFERENCIA</span></b></p>
  </td>
  <td width=317 valign=top style='width:237.75pt;border:solid #999999 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><b><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>DESCRIPCIÓN</span></b></p>
  </td>
  <td width=71 valign=top style='width:53.25pt;border:solid #999999 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><b><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>CANTIDAD</span></b></p>
  </td>
  <td width=65 valign=top style='width:60.0pt;border:solid #999999 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><b><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>VR.UNITARIO</span></b></p>
  </td>
  <td width=87 valign=top style='width:65.25pt;border:solid #999999 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><b><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>VR.TOTAL</span></b></p>
  </td>
 </tr>e
 @foreach($productsPrice as $productPrice)
 <tr style='height:7.5pt'>
  <td width=59 valign=top style='width:44.25pt;border:solid #999999 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>{{ $product[$i]->code }}</span></p>
  </td>
  <td width=317 valign=top style='width:237.75pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>{{ $product[$i]->name }}</span></p>
  </td>
  <td width=71 valign=top style='width:53.25pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>{{ $productPrice->quantity }}</span></p>
  </td>
  <td width=64 valign=top style='width:48.0pt;border-top:none;border-left:none;
  border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>$
  {{number_format($productPrice->price, 2, ',', '.')}}</span></p>
  </td>
  <td width=87 valign=top style='width:65.25pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.5pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:107%'><span
  lang=es style='font-size:8.0pt;line-height:107%;font-family:"Arial",sans-serif'>$
  {{number_format($productPrice->price * $productPrice->quantity, 2, ',', '.')}}</span></p>
  </td>
 </tr>
 {{ $i++ }}
 @endforeach
</table>

<p class=MsoNormal style='line-height:105%'><span lang=ES style='color:white'> </span></p>

<p class=MsoNormal style='text-indent:35.4pt;line-height:105%'><b><span
lang=es style='font-size:9.0pt;line-height:105%;font-family:"Arial",sans-serif'>OBSERVACIONES:</span></b><span
lang=es style='font-size:9.0pt;line-height:105%;font-family:"Arial",sans-serif'> 
{{ $order->coment }}</span><span lang=es> </span></p>

<p class=MsoNormal align=right style='text-align:right;text-indent:35.4pt;
line-height:105%'><b><span lang=es style='font-size:9.0pt;line-height:105%;
font-family:"Arial",sans-serif'>TOTAL:</span></b><span lang=es
style='font-size:9.0pt;line-height:105%;font-family:"Arial",sans-serif'>$ {{number_format($total, 2, ',', '.')}}
</span></p>

<p class=MsoNormal align=right style='text-align:right;line-height:50%'><span
lang=ES style='font-size:10.0pt;line-height:50%;color:#009900'> </span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:105%'><span
lang=ES style='font-size:10.0pt;line-height:105%;font-family:"Arial",sans-serif;
color:red'> </span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:105%'><span
lang=ES style='font-size:10.0pt;line-height:105%;font-family:"Arial",sans-serif;
color:red'> </span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:105%'><span
lang=ES style='font-size:10.0pt;line-height:105%;font-family:"Arial",sans-serif;
color:red'> </span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:105%'><span
lang=ES style='font-size:10.0pt;line-height:105%;font-family:"Arial",sans-serif;
color:red'> </span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:105%'><span
lang=ES style='font-size:10.0pt;line-height:105%;font-family:"Arial",sans-serif;
color:red'> </span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:105%'><span
lang=ES style='font-size:10.0pt;line-height:105%;font-family:"Arial",sans-serif;
color:red'> </span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:105%'><span
lang=ES style='font-size:10.0pt;line-height:105%;font-family:"Arial",sans-serif;
color:red'> </span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:105%'><span
lang=es style='font-size:10.0pt;line-height:105%;font-family:"Arial",sans-serif;
color:red'>Lo valores aquí indicados son valores antes de impuestos</span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:115%'><span
lang=es style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
color:#007F00'>Gracias por considerar el medio ambiente antes de imprimir este
documento. No rompas el ciclo. ¡Recicla!</span></p>

<p class=MsoNormal style='line-height:115%'><span lang=es style='font-family:
"Arial",sans-serif'>&nbsp;</span></p>

</div>

</body>

</html>
