<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function fetch($id)
    {
        $cities = DB::table("cities")->where("state_id",$id)->pluck("name","id");

        return $cities;

    }
}
