<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stages extends Model
{
    use SoftDeletes;

    protected $fillable = ["profile_id", "name", "temp", "time"];

    public function profiles()
    {
        $this->belongsTo("profiles");
    }
}
