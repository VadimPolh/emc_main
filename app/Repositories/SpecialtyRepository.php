<?php namespace App\Repositories;

use App\Models\Specialty;


class SpecialtyRepository extends BaseRepository{

  public function __construct(Specialty $specialty){
    $this->specialty = $specialty;
  }
  
  
  public function store($inputs){
    $specialty = new $this->specialty;
    $this->save($specialty, $inputs);
    return $specialty;
  }
  
  private function save($specialty, $inputs){
    $specialty->name = $inputs['name'];
    $specialty->chief = $inputs['chief'];
    $specialty->specialty_id = $inputs['specialty_id'];
    $specialty->save();
  }
  

  public function counts()
	{
		 return $this->specialty->count();
	}
  
  
	public function index($n)
	{
		
    return $this->specialty->latest()->paginate($n);
	}
  

}