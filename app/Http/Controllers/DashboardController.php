<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Location;
use App\Models\ResponsiblePerson;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $numberOfAssets = Asset::all()->count();
        $numberOfResponsiblePeople= ResponsiblePerson::all()->count();
        $numberOfUsers = User::all()->count();
        $numberOfLocations = Location::all()->count();

        return view('dashboard',compact('numberOfAssets','numberOfResponsiblePeople', 'numberOfUsers', 'numberOfLocations'));
    }
}
