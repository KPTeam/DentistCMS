<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
use App\Models\Pacient;
use App\Models\Treatment;
use Spatie\Activitylog\Traits\LogsActivity;

class Report extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['user.name', 'pacient.first_name','pacient.last_name', 'pacient.personal_number','recommendation','complaint','evaluation','diagnosis','created_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function pacient()
    {
        return $this->belongsTo('App\Models\Pacient');
    }

}
