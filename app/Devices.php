<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devices extends Model
{
    use SoftDeletes;
    protected $table = "devices";
    protected $fillable = ['user_id', 'name', 'mac_address', 'type'];
}
