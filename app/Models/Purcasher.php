<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purcasher extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'purcashers';

    protected $fillable = [
        'user_id', 
        'cart', 
        'name', 
        'address', 
        'payment_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
