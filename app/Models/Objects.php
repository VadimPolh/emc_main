<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objects extends Model {
  
  	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'objects';

  
  public function specialty() 
	{
    return $this->belongsToMany('App\Models\Specialty');
	}
  
  
  
}