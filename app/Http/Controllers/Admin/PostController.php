<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        $category =Category::where('status','0')->get();
        return view('admin.post.create',compact('category'));
    }

    public function store(PostFormRequest $request)
    {
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->slug= Str::slug($request->slug);
      
        $post->description = $request->description;

        $post->yt_iframe = $request->yt_iframe;

        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        
        $post->meta_keyword = $request->meta_keyword;

        $post->status = $request->status == true ?'1':'0';
        $post->created_by = Auth::user()->id;
        $post->save();
        return redirect('admin/posts')->with('message','Post Added Successfully');
    }
    public function edit($post_id)
    {
        $category = Category::where('status','0')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit',compact('post','category'));
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $post = Post::find($post_id);
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->slug = Str::slug($request->slug);
       
        
       
        $post->description = $request->description;

        $post->yt_iframe = $request->yt_iframe;

        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;

        $post->status = $request->status == true ?'1':'0';
        $post->created_by = Auth::user()->id;
        $post->update();

        return redirect('admin/posts')->with('message','Post Updated Successfully');
    }

    public function destroy(Request $request)
    {
       $post = Post::find($request->post_delete_id);
       if($post)
       {
         
            //  $destination = 'uploads/category/'.$post->image;
            //  if(File::exists($destination))
            //  {
            //  File::delete($destination);
            //  }
          $post->comments()->delete();
          $post->delete();
 
          return redirect('admin/posts')->with('message','Post Deleted Successfully');
       }
       else
       {
          return redirect('admin/posts')->with('message','No Post Id Found');
       }
    }

}
