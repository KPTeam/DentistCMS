<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Payment extends Model
{

    use LogsActivity;

    protected static $logAttributes = ['pacient.first_name','pacient.last_name', 'pacient.personal_number', 'value','created_at'];

    public function pacient()
    {
        return $this->belongsTo('App\Models\Pacient');
    }

    public function services()
    {
        return $this->belongsToMany('App\Services','payments_services')->withPivot('tooth', 'discount','quantity');
    }


}
