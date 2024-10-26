<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Location;
use Illuminate\Http\Request;

class Showcase extends Controller
{
    public function locationOfAsset(Request $request){

        $item_name_id = $request->item_name_id;
        $assets = Asset::where('item_name_id', $item_name_id)->get();

        if($assets->isEmpty()){
            return view('showcase.locationOfAsset')->with('message', 'ไม่พบข้อมูลทรัพย์สิน');
        }

        return view('showcase.locationOfAsset',compact('assets'));
    }

    public function assetAtLocation(Request $request){
        $location_id= $request->location_id;

        $assets = Asset::where('location_id', $location_id)->get();

        if($assets->isEmpty()){
            return view('showcase.locationOfAsset')->with('message', 'ไม่พบข้อมูลทรัพย์สิน');
        }

        return view('showcase.assetAtLocation',compact('assets'));
    }
}
