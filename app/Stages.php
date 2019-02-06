<?php

namespace App;
use Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stages extends Model
{
    use SoftDeletes;

    protected $fillable = ["profile_id", "name", "temp", "time"];

    public function getTimeAttribute()
    {
        if (Request::is("ferments/*/edit")) {
            return $this->attributes["time"];
        }
        $dt = \Carbon\Carbon::now();
        $days = $dt->diffInDays($dt->copy()->addSeconds("{$this->attributes["time"]}"));
        $hours = $dt->diffInHours($dt->copy()->addSeconds($this->attributes["time"])->subDays($days));
        $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($this->attributes["time"])->subDays($days)->subHours($hours));
        return \Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
    }
}
