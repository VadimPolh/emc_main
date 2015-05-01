<?php namespace App\Repositories;

use  App\Models\Objects , App\Models\Specialty;

class ObjectRepository extends BaseRepository{


  	public function __construct (Objects $objects, Specialty $specialty)
	  {
		$this->model = $objects;
    $this->specialty = $specialty;
	  }
  
  
  public function index($n)
	{

		return $this->model->paginate($n);
	}
  
  
  
  
  public function store($inputs)
	{
		$object = new $this->model;

		$this->save($object, $inputs);

		return $object;
	}
  
  
  
  private function save($object, $inputs)
	{		
			$object->name = $inputs['name'];
    
    $clean = $inputs['name'];
    
    setlocale(LC_ALL, 'en_US.UTF8');

    $delimiter = '-';

    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $clean);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    $clean = strtolower(trim($clean, $delimiter));

    
    
      $object->slug = $clean;
      $object->save();
			
      $object->specialty()->attach($inputs['specialty_id']);

		  
	}

  
  
  
  
  
  public function create(){
    
    $select = $this->specialty->all()->lists('name','id');
    return compact('select');
  }
  
  public function counts()
	{
		return $this->model->count();
	}


}