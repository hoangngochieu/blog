<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;




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
              
                try {
                    $mail = new PHPMailer(true); //true: enables exceptions
                //      $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                //     $mail->isSMTP();
                //     $mail->CharSet = "utf-8";
                //     $mail->Host = 'smtp.gmail.com'; //SMTP servers
                //     $mail->SMTPAuth = true; // Enable authentication
                //     $nguoigui = 'hoangngochieutin92018@gmail.com';
                //     $matkhau = 'oejx rcab ylxc vwqa';
                //     $tennguoigui = 'Ngoc Hieu Blog';
                //     $mail->Username = $nguoigui; // SMTP username
                //     $mail->Password = $matkhau; // SMTP password
                //     $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL 
                //     $mail->Port = 465; // port to connect to                
                //     $mail->setFrom($nguoigui, $tennguoigui);
                //     // $to = $_POST['email'];
                //     // $to_name = "Bạn";
                //     $tieude = "blog của bạn có bình luận mới";
            
            

                //     $mail->addAddress("hoangngochieutin92018@gmail.com", "Bạn");
                //     $mail->isHTML(true); // Set email format to HTML
                //     $mail->Subject = $tieude;
                //     $noidungthu = $request->comment_body;
                //     $mail->Body = $noidungthu;
                //     $mail->smtpConnect(
                //         array(
                //             "ssl" => array(
                //                 "verify_peer" => false,
                //                 "verify_peer_name" => false,
                //                 "allow_self_signed" => true
                //             )
                //         )
                //     );
                 
                // } catch (Exception $e) {
                //     echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                // }

                    
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();    
                    $mail->CharSet = "utf-8";                                        //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'hoangngochieutin92018@gmail.com';                     //SMTP username
                    $mail->Password   = 'oejx rcab ylxc vwqa';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('hoangngochieutin92018@gmail.com', 'Ngoc Hieu Blog');
                    $mail->addAddress('hoangngochieutin92018@gmail.com', 'Bạn');     //Add a recipient
                                //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                
                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Thông báo';
                    $mail->Body    = 'Ai đó đã comment bài post của bạn: <b>'.$request->comment_body.'</b>'.'('.$post->name.')' ;
                    
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }



            













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
