<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    
    public function index(){
        $hero = Hero::first();
        $services = Service::all();
        return view("frontend.home",compact("hero",'services'));
    }
}
