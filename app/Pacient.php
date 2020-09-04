<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Pacient extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['name','phone','info'];


    public function visit()
    {
        return $this->hasMany('App\Visit');
    }

    public function treatment()
    {
        return $this->hasMany('App\Treatment');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }

    public function report()
    {
        return $this->hasMany('App\Report');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    public function debt()
    {
        return $this->hasMany('App\Debt');
    }

    public static function getPacient($id)
    {
        $pacient = Pacient::find($id);
        return $pacient->name;
    }

    public static function getPacientName($id)
    {
        $pacient = Pacient::find($id);
        return $pacient->name;
    }
}
