<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Nicolaslopezj\Searchable\SearchableTrait;


class Practical extends Model implements SluggableInterface{

    use SluggableTrait;
    use SearchableTrait;

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'title' => 10,
            'summary' => 10
        ]
    ];


    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function objects()
    {
        return $this->belongsTo('App\Models\Objects');
    }

    public function topic()
    {
        return $this->belongsTo('App\Models\Topics','topics_id');
    }
}
