<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model {

	protected $table = 'specialty';


  public function objects() 
	{
    return $this->belongsToMany('App\Models\Objects');
	}
  
  

}
