<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Addres;
use App\Building;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'lastname' => 'string|max:255',     
            'building_name' => 'required|string|max:255',
            'num_locaux' => 'required',
            'nb_app' => 'required',
            'cin'=>'required|min:8|max:8',
            'state' =>  'required|not_in:0',
            'city' => 'required|not_in:0',
            'street' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   $address = Addres::create([
        'state' => $data['state'],
        'city' => $data['city'],
        'street' => $data['street'],
        ]);
        $Building =  Building::create([
            'name' => $data['building_name'],
            'num_app' => $data['nb_app'],
            'num_locaux' => $data['nb_loc'],
            'adress_id' =>$address->id,
            ]);
        return User::create([
            'firstname' => $data['name'],
            'lastname' => $data['lastname'],
            'cin' => $data['cin'],
            'app_num' => $data['app_num'],
            'building_id' => $Building->id,
            'role' => "Syndic",
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
      
    }
}
