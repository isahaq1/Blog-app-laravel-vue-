<?php 
namespace App\Repositories;
interface Bloginterface{
	public function all();

	public function save_post(array $data);
}