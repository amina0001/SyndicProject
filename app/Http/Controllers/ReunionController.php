<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Reunion;
use App\notification;
use App\Building;
use DB;
use App\User;
use Mail;
class ReunionController extends Controller
{
    public $table = "reunions";
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function preview()
    {	
       
         $reunions=DB::table('users')
            ->join('reunions', 'reunions.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->orderBy('date', 'desc')->get();

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
       
        return view('reunion_syndic',compact('reunions','i','notifications','msg'));
       
    }
    /**
     * Seen
     *
     * @return view seen
     */
    public function seen($id)
    {
        $idd =(int)$id;

        $notification = notification::findOrFail($idd);
       dd($notification);
   
          $notification->seen=1;
          $notification->save();
         return redirect(route('reunionSyndic'));
      
    }
    
    
    
    /**
     * ajouter une depense
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' =>  'required|not_in:0',
            'description' => 'required',
            'date' => 'required|Date',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else {
            $reunion = Reunion::create([

                'date' => $request->date,
                'category' => $request->category,
                'user_id' => auth::user()->id,
                'description' => $request->description,
            ]);
            $building=Building::where('id','=',auth::user()->building_id)->first();

            if($request->hasFile('file')){

                $building=Building::where('id','=',auth::user()->building_id)->first();
                $reunion->file =  $reunion->uploadFile($request->file('file'),$reunion->id,'/storage/building'.$building->name.'/reunion/');
                $reunion->save();
            }
            $users = User::where('building_id', auth::user()->building_id)->get();
            foreach ($users as $user) {
                notification::create([

                    'reunion_id' => $reunion->id,
                    'user_id' => $user->id,
                    'seen' => 0,

                ]);
            }
            return redirect(route('reunionSyndic'));
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
            'category' =>  'required|not_in:0',
            'description' => 'required',
            'date' => 'required|Date',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else {

            $reunion = Reunion::where('id',"=",$request->id)->first();

/*            $reunion->user_id = $request->user_id;*/
            $reunion->category = $request->category;
            $reunion->date = $request->date;
            $reunion->description = $request->description;
            $building=Building::where('id','=',auth::user()->building_id)->first();
            if($request->hasFile('file')){

                $building=Building::where('id','=',auth::user()->building_id)->first();
                $reunion->file =  $reunion->uploadFile($request->file('file'),$reunion->id,'/storage/building'.$building->name.'/reunion/');

            }
            $reunion->save();
            return back();
        }
    }
    /**
     * supprimer une  depense
     *
     * @return view
     */
    public function mail($id)
    {
        $reunion=Reunion::findOrfail($id);
        $users=User::where('building_id','=',auth::user()->building_id)->get();
        $data=array(


            'subject'=>$reunion->category,
            'date'=>$reunion->date,
            'description'=>$reunion->description,
        );

        foreach($users as $u){
          $email=$u->email;

            Mail::send('reunion_email',$data,function ($message) use($email)
            {
                $message->from(env('MAIL_USERNAME', 'syndictn@gmail.com'));
                $message->to($email)->subject('réunion');
            }
            );

        }
        return back()->with('success','sucesss');
    }

    public function generatePDF($id)
    {
        $reunion = Reunion::findOrFail($id);
        return Storage::disk('public')->download(str_replace('/storage/', '',$reunion->file));

    }
    public function delete(Request $request)
    {
        $reunion =Reunion::findOrFail($request->id);
        $reunion->delete();
        return back();
    }
}
