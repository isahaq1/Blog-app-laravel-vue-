<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Blogs;

class PostController extends Controller
{
    protected $blogs;
    public function __construct(Blogs $blogs){
     $this->blogs = $blogs;
    }
    // post listing
    public function index() {
        $posts      =   $this->blogs->all();
        return view("blog.index", compact("posts"));
    }

     public function vue_list()
    {
        $posts = $this->blogs->frontendlist();
        return response()->json($posts);
         
    }


    // Create Post 
    public function createPost() {
        return view("blog.create-post");
    }

  

    // Save New Post with Image
    public function savePost(Request $request) {

        $path = "";
        if($request->file('blog_banner')){
            $path = $request->file('blog_banner')->store('public/blog_banner');
        }

        

        $postArray      =   array( 
            "name"           => $request->title,
            "slug"           => $request->description,
            "blog_banner"    => $path,
            "blog_body"      => $request->blog_body,
            "category"       => $request->category,
            "tag"            => $request->tag
        );

        $post  =  $this->blogs->save_post($postArray);

        if(!is_null($post)) {
            return back()->with("success", "Success! Post created");
        }

        else {
            return back()->with("failed", "Failed! Post not created");
        }
    }


    public function upload_images(Request $request)
 {
      $request->validate([
          'upload' => 'image',
      ]);
   if($request->hasFile('upload')) {
     $originName = $request->file('upload')->getClientOriginalName();
     $fileName = pathinfo($originName, PATHINFO_FILENAME);
     $extension = $request->file('upload')->getClientOriginalExtension();
     $fileName = $fileName.'_'.time().'.'.$extension;
    
     $request->file('upload')->move(public_path('images'), $fileName);

     $CKEditorFuncNum = $request->input('CKEditorFuncNum');
     $url = asset('public/images/'.$fileName); 
     $msg = 'Image uploaded successfully'; 
     $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
           
     @header('Content-type: text/html; charset=utf-8'); 
     echo $response;
 }
}


}