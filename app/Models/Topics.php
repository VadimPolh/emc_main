<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model {


    public function lections()
    {
        return $this->hasMany('App\Models\Lection');
    }

}
