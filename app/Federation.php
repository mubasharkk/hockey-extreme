<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Federation extends Model
{
    /**
     * @var string
     */
    protected $table = 'federations';


    function country ()
    {
        return $this->belongsTo('App\Country');
    }
}
