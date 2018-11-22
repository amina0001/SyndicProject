<?php
namespace App\Http\Controllers;
use App\User;
use App\state;
use App\City;
use App\Building;
use App\Addres;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function profile(int $id)
    {   $states = state::all();
        $user=auth::user();
        $bid=auth::user()->building_id;

        $building = Building::where('id',$bid)->first();
        
        $aid= $building->adress_id;

         $adress = Addres::where('id',$aid)->first();
         $cty= City::where('id',$adress->city)->first();
         $st= state::where('id',$adress->state)->first();
         /*dd($st);*/
        return view('profile', ['user'=>User::findOrFail($id),'states'=>$states,'user'=>$user,'building'=>$building,'adress'=>$adress,'cty'=>$cty,'st'=>$st]);
    }
    public function update(Request $request)
    {        $validator = Validator::make($request->toArray(), [
            'firstname' => 'required',
        ]);
         
        $errros = $validator->errors();
        
        if ($validator->fails()) {
            return back()->with(['errors'=>$errros]);
        }

    
        $user = Auth::user();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->cin = $request->cin;
        $bid = Auth::user()->building_id;

        $building = Building::where('id',$bid)->first();
       
        $building->name=$request->building_name;

        $aid=$building->adress_id;
        $adress=Addres::where('id',$aid)->first();
        $city = City::where('id',$adress->city)->first();
        $state = State::where('id',$adress->state)->first();
       
        $adress->street=$request->street;
        $adress->state=$request->state;
        $adress->city=$request->city;
       
        $user->save();
        $building->save();
        $adress->save();
      
return back();
    }
    
    public function updateAvatar(Request $request)
    {
        $user = Auth::user();
        if($request->file('avatar')) {
            $user->photo = '/users/avatars/'.$user->uploadAvatar($request->file('avatar'));
            $user->save();
        }
        return back();
    }
}