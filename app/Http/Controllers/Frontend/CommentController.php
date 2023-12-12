<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
            // $validator = Validator::make($request->all(),[
            //     'comment_body'=> 'required|string'
            // ]);

            // if ($validator->fails())
            // {
            //     return redirect()->back()->with('messagge','Comment area is mandetory');
            // }

            $post = Post::where('slug',$request->post_slug)->where('status','0')->first();
            if ($post)
            {
                Comment::create([
                    'post_id'=> $post->id,
                    'user_id'=> Auth::User()->id,
                     'comment_body'=> $request->comment_body   
                ]);
                return redirect()->back()->with('message','Commented sucessfully');
            }
            else
            {
               return redirect()->back()->with('message','No Such Post Found');
            }
        }
        
        else 
        {
           
           return redirect('login')->with('message','Login first to comment');

        }

    }


    public function update(Request $request)
    {
        if(Auth::check())
        {
             $comment = Comment::where('id',$request->comment_id)->where('user_id',Auth::user()->id)->first();
         
         if($comment)
         {   
            $comment->comment_body = $request->comment_body;
             $comment->update();
             return response()->json([
                 'status' => 200,
                 'message'=>'Comment Updated Successfully'
             ]);
         }
         else
         {
             return response()->json([
                 'status' => 500,
                 'message'=>'Something Went Wrong'
             ]);
         }
       
       
        }
        else
        {
         return response()->json([
             'status' => 401,
             'message'=>'Login to Edit this comment'
         ]);
        }

    }

    public function destroy(Request $request)
    {
       if(Auth::check())
       {
            $comment = Comment::where('id',$request->comment_id)->where('user_id',Auth::user()->id)->first();
        
        if($comment)
        {
            $comment->delete();
            return response()->json([
                'status' => 200,
                'message'=>'Comment Deleted Successfully'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 500,
                'message'=>'Something Went Wrong'
            ]);
        }
      
      
       }
       else
       {
        return response()->json([
            'status' => 401,
            'message'=>'Login to Delete this comment'
        ]);
       }
}


}
