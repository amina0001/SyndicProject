<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Reunion;
use App\notification;
use App\Notificationmsg;
use DB;
use User;
class notificationController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function preview()
    {	
       
       
    }
      public function update($id)
    {
        $notification = notification::find($id);
        $notification->seen='1';
        $notification->save();
         return redirect(route('reunionSyndic'));
    }
       public function msgupdate($id)
    {
        $notification = Notificationmsg::findOrfail($id);
        $notification->seen='1';
        $notification->save();
         return back();
    }
    
    
    
    
    /**
     * ajouter une depense
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    { 
          
       
    }
    /**
     * modifier une  depense
     *
     * @return view
     */

    /**
     * supprimer une  depense
     *
     * @return view
     */
    public function delete(Request $request)
    {
        
    }
}
