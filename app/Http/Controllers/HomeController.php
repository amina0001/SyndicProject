<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\City;
use App\Reunion;
use App\Chore;
use App\Message;
use App\Recette;
use App\Recetteloc;

use App\Depense;
use App\notification;
use App\Notificationmsg;
use DB;
use App\User;

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
    public function adminHome()
    {


        $buildings=DB::table('buildings')
            ->join('address', 'address.id', '=', 'buildings.adress_id')
            ->join('cities', 'cities.id', '=', 'address.city')
            ->join('states', 'states.id', '=', 'address.state')
            ->select('buildings.id as bid','buildings.name as bname', 'address.street as street', 'states.name as sname', 'cities.name as cname')
            ->get()->sortByDesc("id");
       $users= User::get();
       $i=0;
       $buildingempty= collect();
        foreach($buildings as $b){
          foreach ($users as $u){
              if($b->bid  === $u->building_id){
                  $i=$i+1;
              }
          }

          if($i === 0 || $i === 1){
              $buildingempty->push(($b));
          }
          $i=0;
        }


       return view('admin.home',compact('buildings','buildingempty'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $chores=  DB::table('users')
            ->join('chores', 'chores.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->get()->sortByDesc("id");

      $recette = Recette::select(
            DB::raw('sum(price) as sums'), 
            DB::raw("DATE_FORMAT(recettes.created_at,'%Y') as years")
          )

           ->where('user_id','=',auth::user()->id)
          ->groupBy('years')
          ->first();
        $recetteloc = Recetteloc::select(
            DB::raw('sum(price) as sums'),
            DB::raw("DATE_FORMAT(recette_locaux.created_at,'%Y') as years")
        )
            ->where('building_id','=',auth::user()->building_id)
            ->groupBy('years')
            ->first();



       $depense = Depense::select(
        DB::raw('sum(price) as sums'), 
        DB::raw("DATE_FORMAT(created_at,'%Y') as years")
      )
      ->where('building_id','=',auth::user()->building_id)
      ->groupBy('years')
      ->first();

     $reunion = Reunion::select(
        DB::raw('count(reunions.id) as sums'), 
        DB::raw("DATE_FORMAT(reunions.created_at,'%Y') as years")
      )
      ->join('users', 'users.id', '=', 'reunions.user_id')
      ->where('users.building_id','=',auth::user()->building_id)
      ->groupBy('years')
      ->first();
     /*     dd($recette);*/
        return view("home",compact('chores','reunionsnotif','recetteloc','notifications','i','msg','recette','reunion','depense'));
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
