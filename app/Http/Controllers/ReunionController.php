<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Reunion;
use DB;
use User;
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
            ->get()->sortByDesc("id");
   
       
     
        return view('reunion_syndic',compact('reunions'));
       
    }
    
    /**
     * formulaire pour ajouter une  depense
     *
     * @return view
     */
    public function new()
    {
       
    }
 		/**
     * formulaire pour modifier un  depense
     *
     * @return view
     */
    public function edit($id)
    {   
    
    }

    
    
    /**
     * ajouter une depense
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    { 
          
        Reunion::create([
            
            'date' => $request->date,
            'category' => $request->category,
            'user_id'=>auth::user()->id,
            'description' =>$request->description,
        ]);
    	return redirect(route('reunionSyndic'));
    }
    /**
     * modifier une  depense
     *
     * @return view
     */
    public function update(Request $request)
    {	/*dd($request);*/
        $reunion = Reunion::findOrFail($request->id);
       
          $reunion->user_id =$request->user_id;
          $reunion->category =$request->category;
          $reunion->date =$request->date;
          $reunion->description =$request->description;
          $reunion->save();
          return back();
    }
    /**
     * supprimer une  depense
     *
     * @return view
     */
    public function delete(Request $request)
    {
        
    }
}
