<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\GeneralMail;
use App\Models\PriceList;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($data['country'] == 'Colombia') {
            $list = PriceList::where('currency', 'like', 'COP')
                                ->where('role', 'like', 'Ferretero')->first();
            $list_id = $list->id;
        } elseif ($data['country'] == 'Peru') {
            $list = PriceList::where('currency', 'like', 'PEN')
                ->where('role', 'like', 'Ferretero')->first();
            $list_id = $list->id;
        }  elseif ($data['country'] == 'Mexico') {
            $list = PriceList::where('currency', 'like', 'MXN')
                ->where('role', 'like', 'Ferretero')->first();
            $list_id = $list->id;
        }

        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'country' => $data['country'],
            'city' => $data['city'],
            'price_list_id' => $list_id,
            'role' => 'Ferretero',
            'document_type' => $data['document_type'],
            'document_number' => $data['document_number'],
            'establishment_name' => $data['establishment_name'],
            'password' => Hash::make($data['password']),
        ]);

        $subject = 'Notificación de registro';
        $text = 'Sr o Sra '.$data['name']. ' usted has sido registrado en nuestra plataforma correctamente';
        Mail::to($data['email'])->send(new GeneralMail($subject, $text));
        return $user;
    }

}
