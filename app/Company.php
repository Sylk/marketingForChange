<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];

//    NOTE: Similar approach but is taking a less secure route
//    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function employee()
    {
        return $this->hasMany('App\Employee');
    }
}
