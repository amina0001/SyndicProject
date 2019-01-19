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
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'building_name' => 'required|string|max:255',
            'nb_loc' => 'required|max:10',
            'nb_app' => 'required|max:70',
            'cin'=>'required|min:8|max:8',
            'state' =>  'required|not_in:0',
            'city' => 'required|not_in:0',
            'street' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'name.required'=>'champs nom obligatoire',
            'lastname.required'=>'champs prenom obligatoire',
            'building_name.required'=>'champs nom de batiment obligatoire',
            'nb_loc.required'=>'champs Nombre des  locaux commercials à l\'extérieur obligatoire',
            'nb_loc.max'=>'champs au max 10',
            'nb_app.required'=>'champs nombre des appartements obligatoire',
            'nb_app.max'=>'champs au max 70 appartements',
            'state.required'=>'champs gouvernat obligatoire',
            'city.required'=>'champs ville obligatoire',
            'email.required'=>'champs email obligatoire',
            'email.email'=>'champs doit être un email',
            'cin.required'=>'champs cin obligatoire',
            'cin.min'=>'champs cin au min 8 caracteres',
            'cin.max'=>'champs cin au max 8 caracteres' ,

            'password.required'=>'champs password obligatoire',
            'password.min'=>'le champ password doit avoir au minimum 6 caractère',
            'password.confirmed'=>'La confirmation du mot de passe ne correspond pas.',


        ]);
        if($validator->fails()) {

            return $validator;
        }
            else {
                return $validator;
            }

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
        $user= User::create([
            'firstname' => $data['name'],
            'lastname' => $data['lastname'],
            'cin' => $data['cin'],
            'app_num' => $data['app_num'],
            'building_id' => $Building->id,
            'role' => "Syndic",
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $building=Building::where('id','=',$user->building_id)
            ->first();
        $buser= User::where('users.building_id','=',$user->building_id)
            ->first();

        if( !empty ( $buser->app_num) )
            $app_number=$building->num_app-1;
        else{
            $app_number=$building->num_app;
        }
        while($app_number >0){
            User::create([

                'app_num' =>  $app_number,
                'firstname' => "occupant".$app_number,
                'lastname'=>"occupant".$app_number,
                'building_id'=>$user->building_id,
                'role'=> "Occupant",
                'email'=>"appartement".$app_number."@".$building->name.".com",
                'password'=>Hash::make($building->name."app".$app_number),
            ]);
            $app_number=$app_number-1;
        }
            return $user;


    }
}
