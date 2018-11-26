<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Recette;
use Image; 
use View;
use User;
use DB;
class RecetteController extends Controller
{ public function __construct()
    {
        $this->middleware('auth');
    }
  
   public function preview()
    {
      
         $recettes=DB::table('users')
            ->join('recettes', 'recettes.user_id', '=', 'users.id')
            ->get();
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

       return view('recette_syndic',compact('recettes','reunionsnotif','notifications','i'));
       
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

    	$app=$request->app;
    	$users =\App\User::where('app_num',$app)->first();
       
        $id=$users->id;
       
       $recette = Recette::create([
            
            'price' => $request->montant,
            'date' => $request->date,
            'user_id' => $id,
            'description' =>$request->description,
        ]);
        if($request->hasFile('image')){
         
        $cover = $request->file('image');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
         $recette->image = $cover->getFilename().'.'.$extension;
    
        $recette->save();
        };

        return redirect(route('recetteSyndic'));
    }
    /**
     * modifier une  depense
     *
     * @return view
     */
    public function update(Request $request)
    {	/*dd($request);*/
 		$recette = Recette::findOrFail($request->id);
 		
    	  $recette->user_id =$request->user_id;
    	  $recette->price =$request->price;
    	  $recette->date =$request->date;
    	   $recette->description =$request->description;
    	  
          if($request->hasFile('image')){
         
        
        $cover = $request->file('image');
        $extension = $cover->getClientOriginalExtension();
         Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
         $recette->image = $cover->getFilename().'.'.$extension;
          
        };

      
     	 $recette->save();

        

        return back();

    }
    /**
     * supprimer une  depense
     *
     * @return view
     */
    public function delete(Request $request)
    {
         $recette =Recette::findOrFail($request->id);
        $recette->delete();
        return back();
    }
}