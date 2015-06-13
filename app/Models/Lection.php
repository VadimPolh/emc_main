<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

class Lection extends Model implements SluggableInterface{

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

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function attachment()
    {
        return $this->hasMany('App\Models\Attachment');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function practicals()
    {
        return $this->hasMany('App\Models\Practical');
    }


    public function topic()
    {
        return $this->belongsTo('App\Models\Topics','topics_id');
    }
}
