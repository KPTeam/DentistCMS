<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Orchid\Screen\AsSource;
use App\Orchid\Presenters\PacientPresenter;


class Pacient extends Model
{
    use LogsActivity, AsSource;

    protected static $logAttributes = ['first_name', 'fathers_name','last_name','personal_number', 'gender','date_of_birth','address','residence', 'city','phone','email'];

    protected $fillable = ['first_name', 'fathers_name','last_name','personal_number', 'gender','date_of_birth','address','residence', 'city','phone','email'];

    protected $allowedFilters = [
        'id',
        'first_name', 
        'fathers_name',
        'last_name',
        'personal_number', 
        'gender',
        'date_of_birth',
        'address',
        'residence', 
        'city',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'first_name', 
        'fathers_name',
        'last_name',
        'personal_number', 
        'gender',
        'date_of_birth',
        'address',
        'residence', 
        'city',
        'updated_at',
        'created_at',
    ];

    protected $casts = [
        'created_at'    => 'datetime:d-m-Y H:m',
        'updated_at'    => 'datetime:d-m-Y H:m',
    ];

    public function presenter(): PacientPresenter
    {
        return new PacientPresenter($this);
    }

    public function visit()
    {
        return $this->hasMany('App\Models\Visit');
    }

    public function treatment()
    {
        return $this->hasMany('App\Models\Treatment');
    }

    public function appointment()
    {
        return $this->hasMany('App\Models\Appointment');
    }

    public function report()
    {
        return $this->hasMany('App\Models\Report');
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
        return $pacient->first_name. ' '.$pacient->last_name. ' '.$pacient->personal_number ;
    }

    public static function getPacientName($id)
    {
        $pacient = Pacient::find($id);
        return $pacient->first_name. ' '.$pacient->last_name;
    }

    public static function getPacientID($id)
    {
        $pacient = Pacient::find($id);
        return ''.$pacient->personal_number;
    }
}
