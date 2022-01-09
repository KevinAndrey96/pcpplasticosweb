<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Product;
use App\Models\PriceList;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use App\Mail\GeneralMail;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Session;



use Illuminate\Http\Request;

class OrderProductsController extends Controller
{


    public function trolley(Request $request){
        $dataProduct = array();
        $ids = explode(',', $request->cart);
        sort($ids);

        if (! empty($ids)) {

            foreach ($ids as $id) {

                $product = Product::findOrFail($id);
                array_push($dataProduct,$product);

            }

        } else {

            return redirect('/orders');

        }

        if (Auth::user()->role=='Ferretero')
        {

            $distributors = User::where('role', '=', 'Distribuidor')
                                ->where('city', "=", Auth::user()->city)->get();
            return view('orderProducts.index', compact('dataProduct','distributors'));


        } else {

            return view('orderProducts.index', compact('dataProduct'));
        }



    }


    public function bill(Request $request){

        $quantity =  explode(',', $request->cart1);
        $ids = explode(',', $request->cart2);

        if(in_array(null, $quantity) == false &&  $request->address != null ){

            if(Auth::user()->role == 'Ferretero'){

                $sellerRole = 'Distribuidor';

            }else{

                $sellerRole = 'Administrador';
            }

            $buyerRole = Auth::user()->role;
            $buyerId = Auth::user()->id;
            $listId = Auth::user()->price_list_id;
            $list = PriceList::findOrFail($listId);
            $currency = $list->currency;
            $total = 0;
            $i = 0;

            foreach ($ids as $id) {
                $product = Product::find($id);
                $price =  doubleval($product->price);
                $total += $price * intval($quantity[$i]);
                $i++;
            }

            if (Auth::user()->role == "Distribuidor") {
                    $sellerId = 1;
            }elseif(Auth::user()->role == "Ferretero"){

                    $sellerId = $request->seller_id;

            }


            $order = [
                'seller_role' => $sellerRole,
                'status' =>'Iniciado',
                'buyer_role' => $buyerRole,
                'currency' => $currency,
                'total' =>  $total,
                'coment' => $request->coment,
                'delivery_address' => $request->address,
                'city' => $request->city,
                'seller_id' => $sellerId,
                'buyer_id' => $buyerId,

            ];


            $order = Order::create($order);

            $orderId = $order->id;
            $i=0;

            foreach ($ids as $id){
                $product = Product::find($id);
                $orderProduct = new OrderProduct;
                $orderProduct->quantity = intval($quantity[$i]);
                $orderProduct->price = $product->price;
                $orderProduct->currency = $currency;
                $orderProduct->order_id = $orderId;
                $orderProduct->product_id = $product->id;
                $orderProduct->save();
                $i++;
            }

            if (Auth::user()->role == "Ferretero")
            {
                $subject = 'Transferencia solicitada';
                $text = 'Su pedido fue enviado al distribuidor seleccionado, por favor espere su respuesta con su respectiva cotizacíon, gracias por realizar transferencias en nuestra WEB.';
                Mail::to(Auth::user()->email)->send(new GeneralMail($subject, $text));
                $user = User::find($sellerId);
                $subject = 'Transferencia solicitada';
                $text = 'Un ferretero acaba de solicitar una transferencia, por favor revise la plataforma.';
                Mail::to($user->email)->send(new GeneralMail($subject, $text));

                return redirect('/orders')->with('messageSuccess','Su pedido será enviado al distribuidor seleccionado, gracias por realizar transferencias en nuestra WEB');
            } else {
                $productsPrice = OrderProduct::where('order_id', '=', $order->id)->get();
                $total = 0;
                $i = 0;
                $product = new Collection();
                foreach ($productsPrice as $productPrice)
                {
                    $product->push(Product::find($productPrice->product_id));
                    $total += doubleval($productPrice->price * $productPrice->quantity);
                    $i++;
                }

                $user = User::find($order->buyer_id);
                $sellerUser = User::find($order->seller_id);
                $date = Carbon :: now ();
                $sDate =  $date->toDateString();
                $i = 0;
                $pdf = PDF::loadview('quotation.index', compact('product', 'productsPrice', 'user', 'sellerUser', 'order', 'total','sDate','i'));
                $subject = "Envío de cotización";
                $text = 'Buen día apreciado distribuidor<br><br><br>
                En respuesta a su solicitud de pedido, por medio de este correo electrónico se adjunta la cotización correspondiente con identificador interno: '.$order->id.'
                <br><br><br>Cordialmente,
                <br>El equipo de PCP Plasticos.';

                 Mail::send('mails.general', compact('subject', 'text'), function($mail) use ($pdf,$user,$subject,$sellerUser) {
                    $mail->to($user->email);
                    $mail->subject($subject);
                    $mail->attachData($pdf->output(), 'cotizacion.pdf');
                });
                $subject = "Pedido solicitado";
                $text = 'Buen día Administrador<br><br><br>
                Se ha hecho una solicitud de pedido, por medio de este correo electrónico se adjunta la cotización correspondiente con identificador interno: '.$order->id;

                 Mail::send('mails.general', compact('subject', 'text'), function($mail) use ($pdf,$user,$subject,$sellerUser) {
                    $mail->to($sellerUser->email);
                     $mail->subject($subject);
                     $mail->attachData($pdf->output(), 'cotizacion.pdf');
                 });



                 $user = User::find($sellerId);
                 Mail::to($user->email)->send(new GeneralMail($subject, $text));


                return redirect('/orders')->with('messageSuccess','Pedido solicitado con éxito ');

            }


        } else {
            return redirect('/orders');


        }
    }

    public function showOrder(Request $request)
    {
        if ($request->role == 'Administrador') {
            $id = 1;
            $orders = Order::with('buyer')->where('seller_id', '=', $id)->get()->sortByDesc('created_at');
            return view('orders.showOrder', compact('orders'));
        } elseif ($request->role == 'Distribuidor') {

            $orders = Order::with('buyer')->where('seller_id','=', Auth::user()->id)->get()->sortByDesc('created_at');
            return view('orders.showOrder', compact('orders'));

        }
    }

    public function detailOrder(Request $request)
    {
        $products = array();
        $orders = OrderProduct::where('order_id', '=', $request->id)->get();
        $updaOrder = $orders[0];
        $order = Order::find($orders[1]->order_id);
        $status =  $order->status;
        $idOrder = $order->id;

        foreach($orders as $order){
            $product = Product::findOrFail($order->product_id);
            array_push($products,$product);
        }
        return view('orders.detailOrder', compact('idOrder','status','orders','products','updaOrder'))->with('id', $request->id);
    }

    public function detailMyOrder(Request $request)
    {
        $products = array();
        $orders = OrderProduct::where('order_id', '=', $request->id)->get();
        $updaOrder = $orders[0];
        $order = Order::find($orders[1]->order_id);
        $status =  $order->status;
        $idOrder = $order->id;

        foreach ($orders as $order) {
            $product = Product::findOrFail($order->product_id);
            array_push($products,$product);
        }

        return view('orders.detailMyOrder', compact('idOrder','status','orders','products','updaOrder'))->with('id', $request->id);
    }

    public function changeStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->status = $request->status;
        $order->save();
        $user = User::find($order->buyer_id);
        $subject = "Cambio de estado de su pedido";
        $text = 'Sr o Sra '.$user->name.' el estado de su pedido con identificador '.$order->id.' paso a '.$order->status.', cordialmente el equipo de PCP plásticos.';
        Mail::to($user->email)->send(new GeneralMail($subject, $text));
        return redirect('showOrders?role='.Auth::user()->role);
    }


    public function myOrders()
    {
        $userID = Auth::user()->id;
        $orders = Order::with('seller')->where('buyer_id', '=', $userID)->get()->sortByDesc('id');
        return view('orders.myOrders', compact('orders'));
    }

    public function quotation(Request $request)
    {

        $ids = explode(',', $request->ids);
        $prices = explode(',', $request->prices);
        $products = array();

        $i = 0;
         foreach ($ids as $id)
        {
            $orderProduct = OrderProduct::where('order_id', '=', $request->idOrder)
                                        ->where('product_id', '=', $id)->get();

            $orderProduct[0]->price = $prices[$i];
            $orderProduct[0]->save();
            $i++;

        }


        $productsPrice = OrderProduct::where('order_id', "=", $request->idOrder)->get();

        $total = 0;
        $i = 0;
        foreach ($productsPrice as $productPrice)
        {
            $product[$i] = Product::find($productPrice->product_id);
            $total += doubleval($productPrice->price * $productPrice->quantity);
            $i++;
        }

        $order = Order::find($request->idOrder);
        $user = User::find($order->buyer_id);
        $sellerUser = User::find($order->seller_id);
        $date = Carbon :: now ();
        $sDate =  $date->toDateString();

        $i = 0;
        $pdf = PDF::loadview('quotation.index', compact('product', 'productsPrice', 'user', 'sellerUser', 'order', 'total','sDate','i'));
        $subject = "Envío de cotización";
        $text = 'Buen día apreciado cliente<br><br><br>



        En respuesta a su solicitud de transferencia, por medio de este correo electrónico se adjunta la cotización correspondiente con identificador interno: '.$order->id.' para ser revisada.<br>
        Para cualquier respuesta o inquietud por favor comuníquese con su distribuidor encargado:<br><br>

        Nombre de distribuidor: '.$sellerUser->name.
       '<br>Correo electrónico: '.$sellerUser->email.
       '<br>Teléfono: '.$sellerUser->phone.


        '<br><br><br>Cordialmente,
         <br>El equipo de PCP Plásticos.';

         Mail::send('mails.general', compact('subject', 'text'), function($mail) use ($pdf,$user,$subject) {
            $mail->to($user->email);
            $mail->subject($subject);
            $mail->attachData($pdf->output(), 'cotizacion.pdf');
        });


        return redirect()->back()->with('success','Cotización enviada');



    }

    public function downloadPDF(Request $request)
    {
        $productsPrice = OrderProduct::where('order_id', '=', $request->id_order)->get();
        $product = new Collection();
        $total = 0;
        foreach ($productsPrice as $productPrice) {
            $product->push(Product::find($productPrice->product_id));
            $total += doubleval($productPrice->price * $productPrice->quantity);
        }

        $order = Order::find($request->id_order);
        $user = User::find($order->buyer_id);
        $sellerUser = User::find($order->seller_id);
        $date = Carbon :: now ();
        $sDate =  $date->toDateString();
        $i = 0;
        $pdf = PDF::loadview('quotation.index', compact('product', 'productsPrice', 'user', 'sellerUser', 'order', 'total','sDate','i'));
        return $pdf->download('cotizacion-'.$user->name.'-pedidoID-'.$request->id_order.'.pdf');


    }

    public function allTransfers()
    {
        $Fusers = new collection();
        $users = User::all();
        //$orders = new collection();
        $orders = new collection();

        foreach ($users as $user) {
            if ($user->role == 'Ferretero') {
                $Aorders = Order::where('buyer_id', '=', $user->id)->get()->sortByDesc('created_at');
                if($Aorders != null) {
                    foreach ($Aorders as $Aorder) {
                        $orders->push($Aorder);
                    }
                }
            }
        }
        return view('orders.showOrder', compact('orders'));
    }

    public function orderReturn(){
        $ids = session('Sids');
        session()->forget('Sids');
        return view('orders.index', compact('ids'));
    }
}
