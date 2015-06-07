<?php namespace App\Repositories;

use App\Models\Specialty , App\Models\Objects;


class SpecialtyRepository extends BaseRepository{

  
  protected $objects;
  
  
  public function __construct(Specialty $specialty, Objects $objects){
    $this->specialty = $specialty;
    $this->objects = $objects;
  }
  
  public function all()
	{
		return $this->specialty->with('objects')->get();
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
    
    $specialty = $this->specialty->with('objects')->findOrFail($id);

    return compact('specialty');
    
  }
  
  public function edit($id){

    $specialty = $this->specialty->with('objects')->findOrFail($id);
    
    return compact('specialty');
  }
  
  	public function update($inputs, $id)
	{
		$specialty = $this->specialty->findOrFail($id);

		$this->save($specialty, $inputs);
	}

  public function getBySlug($slug)
  {

    return Specialty::findBySlug($slug);

  }

  /**
   * Get Model by id.
   *
   * @param  int  $id
   * @return App\Models\Model
   */
  public function getById($id)
  {
    return $this->specialty->findOrFail($id);
  }

}