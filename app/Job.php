<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type_id', 'date', 'time', 'location', 'price'
    ];

    /**
     * Validation Rule for Creating and Updating.
     *
     * @var array
     */
    public static $validation_rule = [
        'user_id'   => 'required|integer',
        'type_id'   => 'required|integer',
        'date'      => 'required|date_format:Y-m-d',
        'time'      => 'required|date_format:H:i:s',
        'location'  => 'required|string|max:255',
        'price'     => 'required|numeric'
    ];

    /**
     * Get the user that owns the job.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the type that owns the job.
     */
    public function type()
    {
        return $this->belongsTo('App\Type', 'type_id');
    }
}
