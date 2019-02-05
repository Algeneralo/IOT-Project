<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stages extends Model
{
    use SoftDeletes;

    protected $fillable = ["profile_id", "name", "temp", "time"];

    public function getTimeAttribute()
    {
        $dt = \Carbon\Carbon::now();
        $days = $dt->diffInDays($dt->copy()->addSeconds("{$this->attributes["time"]}"));
        $hours = $dt->diffInHours($dt->copy()->addSeconds($this->attributes["time"])->subDays($days));
        $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($this->attributes["time"])->subDays($days)->subHours($hours));
        return \Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
    }
}
