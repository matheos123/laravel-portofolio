<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Hero;
use App\Models\PortfolioSectionSetting;
use App\Models\PortofolioItem;
use App\Models\Service;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    
    public function index(){
        $hero = Hero::first();
        $services = Service::all();
        $about = About::first();
        $typerTitle = TyperTitle::all();
        $portfolioCategories = Category::all();
        $portfolioItems= PortofolioItem::all(); 
        $portfolioTitle =  PortfolioSectionSetting::first();
        return view("frontend.home",
                compact(
                    "hero",
                    'services',
                    'about',
                    'typerTitle',
                    'portfolioTitle',
                    'portfolioCategories',
                    'portfolioItems'
                    ));
    }
    public function showPortfolio($id){
        $portfolio = PortofolioItem::findOrFail($id);
            return view('frontend.portofolio-details',compact('portfolio'));
    }
}
