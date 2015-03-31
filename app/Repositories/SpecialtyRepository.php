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
    $specialty->short_name = $inputs['short_name'];
     $specialty->icon_class = $inputs['icon_class'];
    
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
  
  public function show($id){
    
    $specialty = $this->specialty->findOrFail($id);

		return compact('specialty');
    
  }
  
  public function edit($id){
    
    $specialty = $this->specialty->findOrFail($id);
    
    return compact('specialty');
  }
  
  	public function update($inputs, $id)
	{
		$specialty = $this->specialty->findOrFail($id);

		$this->save($specialty, $inputs);
	}
  
  

}