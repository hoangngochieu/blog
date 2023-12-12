<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {   
        $setting = Setting::all()->first();
        $latest_posts = Post::where('status','0')->orderBy('created_at','DESC')->get()->take(15);
        $all_categories = Category::where('status','0')->get();
        return view('frontend.index',compact('all_categories','latest_posts','setting'));
    }

    public function viewCategoryPost(string $category_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category)
        {
            $post = Post:: where('category_id',$category->id)->where('status','0')->paginate(2);
            return view('frontend.post.index',compact('post','category'));
        }
        else
        {
            return redirect('/')->with('','');
        }  
    }

    public function viewPost(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category)
        {
            $post = Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();
            $latest_posts = Post::where('category_id',$category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(3);
            return view('frontend.post.view',compact('post','latest_posts'));
        }
        else
        {
            return redirect('/')->with('','');
        }  
    }
}
