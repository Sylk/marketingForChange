<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
