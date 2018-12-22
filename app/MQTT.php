<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MQTT extends Model
{
    use SoftDeletes;
    protected $table = "mqtt";
    protected $fillable = ["user_id", "user", "password", "ip", "port"];
    protected $hidden = "password";
}
