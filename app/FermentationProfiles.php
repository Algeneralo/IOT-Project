<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FermentationProfiles extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'type', 'name', 'duration', 'fahrenheit', 'notes'];

    public function stages()
    {
        return $this->hasMany(Stages::class, 'profile_id');
    }

    public function getDurationAttribute()
    {
        $dt = \Carbon\Carbon::now();
        $days = $dt->diffInDays($dt->copy()->addSeconds($this->attributes["duration"]));
        $hours = $dt->diffInHours($dt->copy()->addSeconds($this->attributes["duration"])->subDays($days));
        $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($this->attributes["duration"])->subDays($days)->subHours($hours));
        return \Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
    }
}
