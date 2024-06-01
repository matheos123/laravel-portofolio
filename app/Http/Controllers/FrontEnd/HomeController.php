<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\PortfolioSectionSetting;
use App\Models\PortofolioItem;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
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
        $skill = SkillSectionSetting::first();
        $skillItems= SkillItem::all();
        $experience = Experience::first();
        $portfolioTitle =  PortfolioSectionSetting::first();
        return view("frontend.home",
                compact(
                    "hero",
                    'services',
                    'about',
                    'typerTitle',
                    'portfolioTitle',
                    'portfolioCategories',
                    'portfolioItems',
                    'skill',
                    'skillItems',
                    'experience'
                    ));
    }
    public function showPortfolio($id){
        $portfolio = PortofolioItem::findOrFail($id);
            return view('frontend.portofolio-details',compact('portfolio'));
    }
}
