<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;

class LocationController extends Controller
{
    public function getProvinces(){
        return Province::all();
    }

    public function getRegencies($province_id){
        return Regency::where('province_id', $province_id)->get();
    }
}
