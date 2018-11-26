<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\City;
use App\Reunion;
use App\Chore;
use App\Message;
use App\notification;
use App\Notificationmsg;
use DB;
use User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reunions = Reunion::all()->sortByDesc("id");
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

       $chores= Chore::all()->sortByDesc("id");
        $msg=DB::table('messages')
            ->join('notificationmsgs', 'notificationmsgs.msg_id', '=', 'messages.id')
            ->where('notificationmsgs.user_id','=',auth::user()->id)
            ->orderBy('notificationmsgs.id','dsc')
            ->first();
     
     
        return view("home",compact('reunions','chores','reunionsnotif','notifications','i','msg'));
    }
     public function choreCreate(Request $request)
    {
       $id=auth::user()->id;
        
       $chores = Chore::create([
            
            'chore' => $request->chore,
            'user_id' => $id,
        ]);

        return back()->with('chores');
    }
     public function delete(Request $request)
    {
         $chore =Chore::findOrFail($request->id);
        $chore->delete();
        return back();
    }
    public function depense()
    {
        return view("depense_syndic");
    }
     public function recette()
    {
        return view("recette_syndic");
    }
}
