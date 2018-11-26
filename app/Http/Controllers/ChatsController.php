<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\User;
use App\Notificationmsg;

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
  return view('chat');
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{    
    /*return Message::with('user')->get();*/
    
     $bid = Auth::user()->building_id;
    return Message::with(array('user' => function($query)use($bid){ $query->where('building_id', $bid)->first();}))->get();
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
  
  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);
  $notification = Notificationmsg::get();
   $users=User::where('building_id',auth::user()->building_id)->get();

  if($notification->isEmpty())
  {  foreach ($users as $user) {
           $notification = $user->notificationmsg()->create([
        'user_id' => $user->id,
         'msg_id' => $message->id,
          ]);
        }
    
  }
  elseif($notification->isNotEmpty())
  {  foreach ($users as $u) {
     
    if(!$notification->contains('user_id', $u->id))
    {
      $notification = $user->notificationmsg()->create([
        'user_id' =>$u->id,
         'msg_id' => $message->id,
    ]);

    }elseif($notification->contains('user_id', $u->id)){

      $n=Notificationmsg::where('user_id','=',$u->id)->first();
       
       $n->msg_id =  $message->id;
       $n->seen =   0;
       $n->save();
    }
  }

    }

  
  broadcast(new MessageSent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}
}
