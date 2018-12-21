<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\state;
use App\City;
use App\Building;
use App\Addres;
use Validator;
use Hash;
use DB;


use Illuminate\Support\Facades\Auth;
class AdminOccupantController extends Controller
{    public function occupants(Request $request)
    {
        $occupants=User::where('building_id','=',$request->bid)->get();
        $building=Building::where('id','=',$request->bid)
            ->first();

        $aid= $building->adress_id;

        $adress = Addres::where('id',$aid)->first();
        $cty= City::where('id',$adress->city)->first();
        $st= state::where('id',$adress->state)->first();

        return view('admin.occupants',compact('occupants','building','adress','cty','st'));
    }
    public function generoccupants(Request $request)
    {
        $building=Building::where('id','=',$request->bid)
            ->first();
        $buser= User::where('users.building_id','=',$request->bid)
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
                'building_id'=>$request->bid,
                'role'=> "Occupant",
                'email'=>"appartement".$app_number."@".$building->name.".com",
                'password'=>Hash::make($building->name."app".$app_number),
            ]);
            $app_number=$app_number-1;
        }
        $occupants=User::where('building_id','=',$request->bid)->get();
        $aid= $building->adress_id;

        $adress = Addres::where('id',$aid)->first();
        $cty= City::where('id',$adress->city)->first();
        $st= state::where('id',$adress->state)->first();


        return view('admin.occupants',compact('occupants','building','adress','cty','st'));
    }
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
        $reunionsnotif=DB::table('users')
            ->join('reunions', 'reunions.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->get()->sortByDesc("id");

        $notifications=DB::table('reunions')
            ->join('notification', 'notification.reunion_id', '=', 'reunions.id')
            ->join('users', 'users.id', '=','notification.user_id')
            ->where('notification.user_id',auth::user()->id)
            ->where('users.building_id','=',auth::user()->building_id)
            ->get()->sortByDesc("id");


        $i=0;
        foreach ($notifications as $n) {

            if(strtotime(date("Y-m-d")) < strtotime($n->date)){

                if($n->seen==0){
                    $i=$i+1;

                }

            }
        }
        $msg=DB::table('messages')
            ->join('notificationmsgs', 'notificationmsgs.msg_id', '=', 'messages.id')
            ->where('notificationmsgs.user_id','=',auth::user()->id)
            ->orderBy('notificationmsgs.id','dsc')
            ->first();
        return view('profile', ['user'=>User::findOrFail($id),'states'=>$states,'user'=>$user,'building'=>$building,'adress'=>$adress,'cty'=>$cty,'st'=>$st,'i'=>'$i','msg'=>$msg,'reunionsnotif'=>$reunionsnotif,'notifications'=>$notifications]);
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
    public function occupant()
    {
        $reunionsnotif=DB::table('users')
            ->join('reunions', 'reunions.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->get()->sortByDesc("id");

        $notifications=DB::table('reunions')
            ->join('notification', 'notification.reunion_id', '=', 'reunions.id')
            ->join('users', 'users.id', '=','notification.user_id')
            ->where('notification.user_id',auth::user()->id)
            ->where('users.building_id','=',auth::user()->building_id)
            ->get()->sortByDesc("id");


        $i=0;
        foreach ($notifications as $n) {

            if(strtotime(date("Y-m-d")) < strtotime($n->date)){

                if($n->seen==0){
                    $i=$i+1;

                }

            }
        }
        $msg=DB::table('messages')
            ->join('notificationmsgs', 'notificationmsgs.msg_id', '=', 'messages.id')
            ->where('notificationmsgs.user_id','=',auth::user()->id)
            ->orderBy('notificationmsgs.id','dsc')
            ->first();

        $users = User::where('building_id','=',auth::user()->building_id)->get();

        return view('users',compact('users','msg','i','notifications','reunionsnotif'));


    }
}