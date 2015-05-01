<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Objects extends Model implements SluggableInterface{
  
  	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'objects';
  
  use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

  
  public function specialty() 
	{
    return $this->belongsToMany('App\Models\Specialty');
	}
  
  
  
}