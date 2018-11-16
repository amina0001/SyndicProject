<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\City;
use App\Reunion;
use App\Chore;
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
       

       $chores= Chore::all()->sortByDesc("id");
   
      
        return view("home",compact('reunions','chores'));
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
