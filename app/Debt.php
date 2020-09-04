<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Debt extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['pacient.name','pacient.phone', 'pacient.info', 'deadline','value','created_at'];

    public function pacient()
    {
        return $this->belongsTo('App\Pacient');
    }
}
