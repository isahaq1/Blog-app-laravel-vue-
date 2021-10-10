<?php
namespace App\Repositories;
use App\Models\Post;
Class Blogs implements Bloginterface {


	public function all(){
     return Post::orderBy("id", "desc")->paginate(5);
	}
	public function save_post(array $data){
     return Post::create($data);
	}

	public function frontendlist(){
     return Post::get();
	}

}

	
