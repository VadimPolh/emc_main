<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Specialty extends Model implements SluggableInterface{


	protected $table = 'specialty';


	use SluggableTrait;

	protected $sluggable = array(
		'build_from' => 'short_name',
		'save_to'    => 'slug',
	);

  public function objects() 
	{
    return $this->belongsToMany('App\Models\Objects');
	}


	public function groups(){
		return $this->hasMany('App\Models\Groups');
	}
}
