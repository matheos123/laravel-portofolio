<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Category;
use App\Models\ContactSectionSetting;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSetting;
use App\Models\FooterInfo;
use App\Models\FooterSocialLink;
use App\Models\FooterUsefulLink;
use App\Models\Hero;
use App\Models\PortfolioSectionSetting;
use App\Models\PortofolioItem;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $contactTitle = ContactSectionSetting::first();

        $footerInfo = FooterInfo::first();
        $footerSocialLink = FooterSocialLink::all();
        $usefulLinks = FooterUsefulLink::all();
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
                    'blogTitle',
                    'contactTitle',
                    'footerInfo',
                    'footerSocialLink',
                    'usefulLinks'
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
        $request->validate([
            'name'=>['required','max:200'],
            'subject'=>['required','max:500'],
            'email'=>['required','email'],
            'message'=>['required','max:2000']
        ]);
        Mail::send(new ContactMail($request->all()));
        return response(['status'=>'success','message'=>'Mail Sent']);
    }
}
