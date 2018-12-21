<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\User;
use App\Notificationmsg;
use DB;
class ChatsController extends Controller
{
    public function __construct()
{
  $this->middleware('auth');
}

/**
 * Show chats
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
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

    return view('chat',compact('i','msg','notifications'));
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{

    $bid = Auth::user()->building_id;
    return Message::with(array('user' => function($query)use($bid){ $query->where('building_id', $bid)->get();}))->get();

  /*
         $messages=DB::table('users')
            ->join('messages', 'messages.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->get()->sortByDesc("id");
          return DB::table('users')
            ->join('messages', 'messages.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->get()->sortByDesc("id");*/
}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
/*public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  return ['status' => 'Message Sent!'];
}*/
public function sendMessage(Request $request)
{
  $user = Auth::user();
  $i=0;
  
   $messages = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  $notification = Notificationmsg::get();
   $users=User::where('building_id',auth::user()->building_id)->get();

  if($notification->isEmpty())
  {  foreach ($users as $user) {
           $notification = $user->notificationmsg()->create([
        'user_id' => $user->id,
         'msg_id' => $messages->id,
          ]);
        }
    
  }
  elseif($notification->isNotEmpty())
  {  foreach ($users as $u) {
     
    if(!$notification->contains('user_id', $u->id))
    {
      $notification = $user->notificationmsg()->create([
        'user_id' =>$u->id,
         'msg_id' => $messages->id,
    ]);

    }elseif($notification->contains('user_id', $u->id)){

      $n=Notificationmsg::where('user_id','=',$u->id)->first();
       
       $n->msg_id =  $messages->id;
       $n->seen =   0;
       $n->save();
    }
  }

    }


  broadcast(new MessageSent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}
}
