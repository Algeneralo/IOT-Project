<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FermentationProfiles extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'type', 'name', 'duration', 'f', 'notes'];

    public function stages()
    {
        $this->hasMany("stages");
    }
}
