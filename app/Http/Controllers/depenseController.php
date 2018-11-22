<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Depense;
use Validator;
use Image; 
use View;
use App\User;
use App\Message;
use DB;
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
    public function preview()
    {
        $id=auth::user()->building_id;
        $depenses = depense::where('building_id',$id)->get()->sortByDesc("id");
        $des=Null;
        $bid = User::where('building_id',$id)->first();
       /* dd(  Message::with(array('user' => function($query)use($bid){ $query->where('building_id', $bid->building_id)->first();}))->get()); */
      /* dd(Message::with('user')->get());*/

         return view('depense_syndic',compact('depenses','des'));
        
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
     */
    public function create(Request $request)
    {   $this->validate($request, [
        'titre' => 'required',
        'date' => 'required',
        'price' => 'required',
        'description' => 'required',
        ]);

      $id=Auth::user()->building_id;
       $depense = Depense::create([
            'titre' => $request->titre,
            'price' => $request->montant,
            'date' => $request->date,
            'building_id' => $id,
            'description' =>$request->description,
        ]);
        if($request->hasFile('image')){
         
        $cover = $request->file('image');
        $extension = $cover->getClientOriginalExtension();
     Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
         $depense->image = $cover->getFilename().'.'.$extension;
    
        $depense->save();
        };

        return redirect(route('depensesSyndic'));

    }
    /**
     * modifier une  depense
     *
     * @return view
     */
    public function update(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'titre' => 'required',
            'montant' => 'required',
            'date'=>'date',

          
        ]);
         
        if ($validator->fails()) {
           return back();
            //return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
    	 $depense = Depense::findOrFail($request->id);
         $b_id=Auth::user()->building_id;
    	  
    	  $depense->titre =$request->titre;
    	  $depense->price =$request->montant;
    	  $depense->date =$request->date;
    	   $depense->description =$request->description;
    	  $depense->building_id =$b_id;
          if($request->hasFile('image')){
         
        
        $cover = $request->file('image');
        $extension = $cover->getClientOriginalExtension();
         Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
         $depense->image = $cover->getFilename().'.'.$extension;
          
        };

        $depense->save();

        return response()->json(['success'=>'mettre à jour avec succès']);
}
        
        
        /*
        return response()->json(['success'=>'Record is successfully added']);
*/
      
      
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
}
