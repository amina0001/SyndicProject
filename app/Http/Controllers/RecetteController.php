<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Recette;
use Image;
use View;
use App\User;
use DB;
use App\Building;
use App\Addres;
use App\City;
use App\state;
use App\RecetteMonth;
use App\Recetteloc;
use PDF;
use Carbon\Carbon;
use Mail;
class RecetteController extends Controller
        { public function __construct()
        {
            $this->middleware('auth');
        }
    public function update(Request $request)
        {
            $validators = Validator::make($request->all(), [
                'app' =>  'required|not_in:0',
                'price' => 'required',
                'date' => 'required|Date',

            ]);
            if ($validators->fails())
            {
                return response()->json(['errors'=>$validators->errors()->all()]);
            }else {

        $recette = Recette::where('id',"=",$request->id)->first();

        $recette->user_id =$request->app;
        $recette->price =$request->price;
        $recette->date =$request->date;
        $recette->description =$request->description;

        if($request->hasFile('image')){


           /* $cover = $request->file('image');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
            $recette->image = $cover->getFilename().'.'.$extension;*/
            $building=Building::where('id','=',auth::user()->building_id)->first();

            $recette->image =  $recette->uploadImage($request->file('image'), '/storage/building'.$building->name.'/recette/',$recette->id);

        }
            $recetteMonth = RecetteMonth::where('recette_id',"=",$request->id)->first();
            $recetteMonth->years = date('Y', strtotime($request->date));
            $recetteMonth->months =date('m', strtotime($request->date));
            $recetteMonth->user_id =$request->app;




            $recette->save();
            $recetteMonth->save();

        return redirect(route('recetteSyndic'));
            }
    }




    public function updateloc(Request $request)
    {   /*dd($request);*/
        $validators = Validator::make($request->all(), [
            'category' =>  'required|not_in:0',
            'nom' => 'required|max:50',
            'price' => 'required',
            'date' => 'required|Date',

        ]);
        if ($validators->fails())
        {
            return response()->json(['errors'=>$validators->errors()->all()]);
        }else {
/*            dd($request);*/

            $recette = Recetteloc::find($request->id);

            $recette->category =$request->category;
            $recette->nom =$request->nom;

            $recette->price =$request->price;
            $recette->date =$request->date;
            $recette->description =$request->description;
            $building=Building::where('id','=',auth::user()->building_id)->first();
            if($request->hasFile('image')){


 /*               $cover = $request->file('image');
                $extension = $cover->getClientOriginalExtension();
                Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
                $recette->image = $cover->getFilename().'.'.$extension;*/
                $recette->image =  $recette->uploadImage($request->file('image'), '/storage/building'.$building->name.'/recette/',$recette->id);


            }

            $recette->save();


            return redirect(route('recetteSyndic'));
        }
    }
    public function preview()
    {    $buser= User::where('users.building_id','=',auth::user()->building_id)
                ->whereNotIn('users.app_num', [''])
                ->get();

        $unpaid=DB::table('recette_months')

            ->join('users', 'recette_months.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->select('recette_months.id as id','recette_months.months as months', 'recette_months.years as years', 'recette_months.recette_id as recette_id', 'recette_months.user_id as user_id')
            ->get()
            ->groupBy(['months','years']);

/*           dd($unpaid->flatten());*/
        /* $unpaid=$unpaid->flatten();*/

        $shit=collect();

        $i=0;

        foreach($unpaid as  $ps)
        {

            foreach($buser as $b)
            {
                foreach($ps as $key=>$p) {
                    foreach ($p as $item){

                        if ($item->user_id === $b->id) {
                            $i=$i+1;
                            break;
                        }else {
                            $i=0;
                        }
                    }


                }

                if($i===0){
                    /*    $shit->push($b);*/
                    $tab =['months' => $item->months ,'years'=>$item->years ,'app_num'=> $b->app_num,'email'=>$b->email ];

                    $shit->push(($tab));

/*                    dd($shit);*/

                }
            }


        }

        $recettes=DB::table('recettes')
            ->join('users', 'recettes.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->select('recettes.id as id','recettes.user_id as user_id', 'users.app_num as app', 'recettes.price as price', 'recettes.date as date', 'recettes.description as description', 'recettes.image as image')

            ->orderBy('date', 'desc')
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
        $now = Carbon::now();
        $year = $now->year;
        $dmonths=DB::table('users')
            ->join('recettes', 'recettes.user_id', '=', 'users.id')
            ->where('users.building_id','=',auth::user()->building_id)
            ->select(DB::raw('MONTH(date) as month,YEAR(date) as year'))
            ->whereYear('date', '=', $year)
            ->groupBy('month','year')
            ->get();



        $month = $now->month;

        $msg=DB::table('messages')
            ->join('notificationmsgs', 'notificationmsgs.msg_id', '=', 'messages.id')
            ->where('notificationmsgs.user_id','=',auth::user()->id)
            ->orderBy('notificationmsgs.id','dsc')
            ->first();
        $recettesloc=Recetteloc::where('building_id','=',auth::user()->building_id)

            ->get()->sortByDesc("id");

        return view('recette_syndic',compact('recettes','recettesloc','msg','reunionsnotif','notifications','i','dmonths','month','year','shit','buser'));

    }


    /**
     * ajouter une recette
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app' =>  'required|not_in:0',
            'price' => 'required|integer',
            'date' => 'required|Date',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else {

            $findRM = RecetteMonth::where('user_id', "=", $request->app)
                ->where('years', '=', date('Y', strtotime($request->date)))
                ->where('months', '=', date('m', strtotime($request->date)))
                ->first();

            if ($findRM === null) {
                /*            dd($findRM);*/

                $app = $request->app;
                $users = User::where('app_num', $app)->first();

                $id = $users->id;

                $recette = Recette::create([

                    'price' => $request->price,
                    'date' => $request->date,
                    'user_id' => $request->app,
                    'description' => $request->description,
                ]);
                $building=Building::where('id','=',auth::user()->building_id)->first();

                if ($request->file('image')) {

                   /* $cover = $request->file('image');
                    $extension = $cover->getClientOriginalExtension();
                    Storage::disk('public')->put($cover->getFilename() . '.' . $extension, File::get($cover));
                    $recette->image = $cover->getFilename() . '.' . $extension;*/

                    $recette->image =  $recette->uploadImage($request->file('image'), '/storage/building'.$building->name.'/recette/',$recette->id);

                    $recette->save();
                };
                $recetteMonth = RecetteMonth::create([

                    'years' => date('Y', strtotime($request->date)),
                    'months' => date('m', strtotime($request->date)),
                    'user_id' => $request->app,
                    'recette_id' => $recette->id,
                ]);
            }

            return redirect(route('recetteSyndic'));
        }


    }
    /**
     * ajouter une  recette exterieur
     *
     * @return view
     */
    public function createloc(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' =>  'required|not_in:0',
            'nom' =>  'required|string|max:50',
            'price' => 'required|integer',
            'date' => 'required|Date',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else {



                $recetteloc = Recetteloc::create([
                    'category' => $request->category,
                    'nom' => $request->nom,
                    'price' => $request->price,
                    'date' => $request->date,
                    'building_id' => auth::user()->building_id,
                    'description' => $request->description,
                ]);
            if ($request->file('image')) {
                $building=Building::where('id','=',auth::user()->building_id)->first();

                /* $cover = $request->file('image');
                 $extension = $cover->getClientOriginalExtension();
                 Storage::disk('public')->put($cover->getFilename() . '.' . $extension, File::get($cover));
                 $recette->image = $cover->getFilename() . '.' . $extension;*/

                $recetteloc->image =  $recetteloc->uploadImage($request->file('image'), '/storage/building'.$building->name.'/recette/',$recetteloc->id);

                $recetteloc->save();
            };




            return redirect(route('recetteSyndic'));
        }


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
    public function generatePDF(Request $request)
    { $now = Carbon::now();
        $monthStart = $now->month;
        $year=$now->year;
        if(strlen($request->month)===2 || strlen($request->month)===1 ){
            $recettes=DB::table('users')
                ->join('recettes', 'recettes.user_id', '=', 'users.id')
                ->where('users.building_id','=',auth::user()->building_id)
                ->whereMonth('date', '=', (int)$request->month)
                ->whereYear('date', '=', $year)
                ->get();
            $recettesloc=DB::table('users')
                ->join('recette_locaux', 'recette_locaux.building_id', '=', 'users.building_id')
                ->where('users.building_id','=',auth::user()->building_id)
                ->whereMonth('date', '=', (int)$request->month)
                ->whereYear('date', '=', $year)
                ->get();

        }
        elseif(strlen($request->month)===4){

            $recettes=DB::table('users')
                ->join('recettes', 'recettes.user_id', '=', 'users.id')
                ->where('users.building_id','=',auth::user()->building_id)
                ->whereYear('date', '=', (int)$request->month)
                ->get();
            $recettesloc=DB::table('users')
                ->join('recette_locaux', 'recette_locaux.building_id', '=', 'users.building_id')
                ->where('users.building_id','=',auth::user()->building_id)
                ->whereYear('date', '=', (int)$request->month)
                ->get();
        }
        $building=Building::where('id','=',auth::user()->building_id)
            ->first();

        $aid= $building->adress_id;

        $adress = Addres::where('id',$aid)->first();
        $cty= City::where('id',$adress->city)->first();
        $st= state::where('id',$adress->state)->first();

        $pdf = PDF::loadView('recettepdf', compact('recettes','recettesloc','building','adress','cty','st'));

        return $pdf->stream('document.pdf');
//        return $pdf->download('itsolutionstuff.pdf');
    }



    public function mail($email)
    {



            Mail::send('recette_email',[],function ($message) use($email)
            {
                $message->from(env('MAIL_USERNAME', 'syndictn@gmail.com'));
                $message->to($email)->subject('alert');
            }
            );


        return back()->with('success','sucesss');
    }
}