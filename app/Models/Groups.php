<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Groups extends Model implements SluggableInterface{

	use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    public function mentor()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\Specialty');
    }
  
}
