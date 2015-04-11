<?php namespace App\Repositories;

use  App\Models\Objects;

class ObjectRepository extends BaseRepository{


  	public function __construct (Objects $objects)
	  {
		$this->model = $objects;
	  }
  
  
  public function index($n)
	{

		return $this->model->paginate($n);
	}
  
  public function counts()
	{
		return $this->model->count();
	}


}