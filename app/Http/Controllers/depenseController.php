<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Depense;
use Validator;
use Image; 
use View;
use App\User;
use App\Addres;
use App\state;
use App\City;
use App\Message;
use DB;
use PDF;
use Carbon\Carbon;
class depenseController extends Controller
{

    /**
     * prevue une depense
     *
     * @return view
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function preview()
    {
        $id=auth::user()->building_id;
        $depenses = depense::where('building_id',$id)->orderBy('date', 'desc')->get();
        $des=Null;
        $bid = User::where('building_id',$id)->first();
    
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
        $now = Carbon::now();
        $year = $now->year;

           $dmonths =Depense::select(DB::raw('MONTH(date) as month,YEAR(date) as year'))
               ->where('building_id','=',auth::user()->building_id)
               ->whereYear('date', '=', $year)
               ->groupBy('month','year')
               ->get();
                $month = $now->month;
        $msg=DB::table('messages')
            ->join('notificationmsgs', 'notificationmsgs.msg_id', '=', 'messages.id')
            ->where('notificationmsgs.user_id','=',auth::user()->id)
            ->orderBy('notificationmsgs.id','dsc')
            ->first();
                 return view('depense_syndic',compact('depenses','msg','des','reunionsnotif','notifications','i','dmonths','month','year'));
        
    }
    /**
     * formulaire pour ajouter une  depense
     *
     * @return view
     */
    public function new()
    {
         return view('depense_Syndic')->with(['depense'=>null]);
    }
 		/**
     * formulaire pour modifier un  depense
     *
     * @return view
     */
    public function edit($id)
    {   $des = Depense::findOrFail($id);
         $id=auth::user()->building_id;
        $depenses = depense::where('building_id',$id)->get();
        /* return view('depense_syndic',compact('des',,$''));
    */ 
     return response(view('depense_Syndic',array('des'=>$des,'despenses'=>$depenses)),200, ['Content-Type' => 'application/json']);
       
    
    }
    /**
     * ajouter une depense
     *
     * @param Request $request
     * @return void
     **/
    public function create(Request $request)
    {    $validators = Validator::make($request->all(), [
        'titre' => 'required',
        'date' => 'required|Date',
        'price' => 'required',

        ]);
        if ($validators->fails())
        {
            return response()->json(['errors'=>$validators->errors()->all()]);
        }else {

            $id = Auth::user()->building_id;
            $depense = Depense::create([
                'titre' => $request->titre,
                'price' => $request->price,
                'date' => $request->date,
                'building_id' => $id,
                'description' => $request->description,
            ]);
            $building=Building::where('id','=',auth::user()->building_id)->first();

            if ($request->file('image')) {


                $depense->image =  $depense->uploadImage($request->file('image'), '/storage/building'.$building->name.'/depense/',$depense->id);

                $depense->save();
            };

            return redirect(route('depensesSyndic'));
        }

    }
    /**
     * modifier une  depense
     *
     * @return view
     */
    public function update(Request $request)
    {
         $validator = Validator::make($request->all(), [
             'id'=>'required',
            'titre'=>'required',
            'price' => 'required',
            'date'=>'required',

          
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
            $b_id=Auth::user()->building_id;
            $id=$request->id;
            $depense = Depense::find($id);

          $depense->description =$request->input('description');
    	  $depense->titre =$request->input('titre');
    	  $depense->price =$request->input('price');
    	  $depense->date =$request->input('date');

    	  $depense->building_id =$b_id;
        $building=Building::where('id','=',auth::user()->building_id)->first();

        if ($request->file('image')) {


            $depense->image =  $depense->uploadImage($request->file('image'), '/storage/building'.$building->name.'/depense/',$depense->id);

            $depense->save();
        };

        $depense->save();

        /*    return redirect(route('depensesSyndic'));*/
            return back();


    }
    /**
     * supprimer une  depense
     *
     * @return view
     */
    public function delete(Request $request)
    {
        $depense =Depense::findOrFail($request->id);
        $depense->delete();
        return back();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function generatePDF(Request $request)
    { $now = Carbon::now();
        $monthStart = $now->month;
       $year=$now->year;
       if(strlen($request->month)===2){
           $depenses = Depense::where('building_id','=',auth::user()->building_id)
               ->whereMonth('date', '=', (int)$request->month)
               ->whereYear('date', '=', $year)
               ->get();
       }
       elseif(strlen($request->month)===4){
           $depenses = Depense::where('building_id','=',auth::user()->building_id)
               ->whereYear('date', '=', (int)$request->month)

               ->get();

       }
        $building=Building::where('id','=',auth::user()->building_id)
            ->first();

        $aid= $building->adress_id;

        $adress = Addres::where('id',$aid)->first();
        $cty= City::where('id',$adress->city)->first();
        $st= state::where('id',$adress->state)->first();

        $pdf = PDF::loadView('depensepdf', compact('depenses','building','adress','cty','st'));

        return $pdf->stream('document.pdf');
//        return $pdf->download('itsolutionstuff.pdf');
    }
}
