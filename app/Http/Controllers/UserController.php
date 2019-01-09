<?php
namespace App\Http\Controllers;
use App\User;
use App\state;
use App\City;
use App\Building;
use App\Addres;
use Validator;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function profile(int $id)
    {   $states = state::all();
        $user=Auth::user();
        $building=null;
        $adress=null;
        $st=null;
        $cty=null;
        $adress=null;
        $notifications=collect();
        $msg=null;
        $reunionsnotif=null;
        if(Auth::id() == $id) {
            if ($user->role !== "admin") {
                $bid = auth::user()->building_id;

                $building = Building::where('id', $bid)->first();

                $aid = $building->adress_id;

                $adress = Addres::where('id', $aid)->first();
                $cty = City::where('id', $adress->city)->first();
                $st = state::where('id', $adress->state)->first();
                /*dd($st);*/
                $reunionsnotif = DB::table('users')
                    ->join('reunions', 'reunions.user_id', '=', 'users.id')
                    ->where('users.building_id', '=', auth::user()->building_id)
                    ->get()->sortByDesc("id");

                $notifications = DB::table('reunions')
                    ->join('notification', 'notification.reunion_id', '=', 'reunions.id')
                    ->join('users', 'users.id', '=', 'notification.user_id')
                    ->where('notification.user_id', auth::user()->id)
                    ->where('users.building_id', '=', auth::user()->building_id)
                    ->get()->sortByDesc("id");


                $i = 0;
                foreach ($notifications as $n) {

                    if (strtotime(date("Y-m-d")) < strtotime($n->date)) {

                        if ($n->seen == 0) {
                            $i = $i + 1;

                        }

                    }
                }
                $msg = DB::table('messages')
                    ->join('notificationmsgs', 'notificationmsgs.msg_id', '=', 'messages.id')
                    ->where('notificationmsgs.user_id', '=', auth::user()->id)
                    ->orderBy('notificationmsgs.id', 'dsc')
                    ->first();
            }
            $disabl = auth::user()->role === "Syndic" ? "" : "disabled";
            $readonly="";
            if($disabl === "disabled"){
                $readonly="readonly";
            }
           else{
               $readonly="";
                }
        }else{
            return back();
        }

        return view('profile', ['user'=>User::findOrFail($id),'readonly'=>$readonly,'states'=>$states,'user'=>$user,'building'=>$building,'adress'=>$adress,'cty'=>$cty,'st'=>$st,'i'=>'$i','msg'=>$msg,'reunionsnotif'=>$reunionsnotif,'notifications'=>$notifications,'disabl'=>$disabl]);
    }
    public function update(Request $request)
    {        $validator = Validator::make($request->toArray(), [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'building_name' => 'required|string|max:255',
                'num_locaux' => 'required',
                'num_app' => 'required',
                'app_num'=>'required',
                'cin'=>'required|min:8|max:8',
                'state' =>  'required|not_in:0',
                'city' => 'required|not_in:0',
                'street' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
             ]);
         

        if ($validator->fails()) {
            return back()->with(['errors'=>$validator->errors()]);
        }

    
        $user = Auth::user();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->cin = $request->cin;
        if( $user->role !== "admin") {
            $bid = Auth::user()->building_id;

            $building = Building::where('id', $bid)->first();

            $building->name = $request->building_name;
            $building->num_app = $request->num_app;
            $building->num_locaux = $request->num_locaux;
            $aid = $building->adress_id;
            $adress = Addres::where('id', $aid)->first();
            $city = City::where('id', $adress->city)->first();
            $state = State::where('id', $adress->state)->first();

            $adress->street = $request->street;
            $adress->state = $request->state;
            $adress->city = $request->city;
            $building->save();
            $adress->save();
        }

        if($request->file('avatar')) {

            $user->photo =  $user->uploadImage($request->file('avatar'), '/storage/users/avatars/',$user->id);

        }

        $user->save();


        return response()->json(200);
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
        $building=Building::where('id','=',auth::user()->building_id)->first();
           return view('users',compact('users','msg','i','notifications','reunionsnotif','building'));


    }
}