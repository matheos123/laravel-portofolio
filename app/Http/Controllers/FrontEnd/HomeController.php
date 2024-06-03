<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSetting;
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
        $feedbacks = Feedback::all();
        $blogs= Blog::latest()->take(5)->get();
        $feedbackSetting = FeedbackSetting::first();
        $portfolioTitle =  PortfolioSectionSetting::first();
        $blogTitle= BlogSectionSetting::first();
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
                    'experience',
                    'feedbackSetting',
                    'feedbacks',
                    'blogs',
                    'blogTitle'
                    ));
    }
    public function showPortfolio($id){
        $portfolio = PortofolioItem::findOrFail($id);
            return view('frontend.portofolio-details',compact('portfolio'));
    }

    public function showBlog($id){
        $blog = Blog::findOrFail($id);
        $previousPost = Blog::where('id','<',$blog->id)->orderBy('id','desc')->first();
        $nextPost = Blog::where('id','>',$blog->id)->orderBy('id','asc')->first();

        return view('frontend.blogdetails',compact('blog','previousPost','nextPost'));
    }

    public function blog(){
        $blogs = Blog::latest()->paginate(2);
        return view('frontend.blog',compact('blogs'));
    }
    public function contact(Request $request){
        
    }
}
