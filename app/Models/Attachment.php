<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
