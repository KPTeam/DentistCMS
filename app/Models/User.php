<?php

namespace App\Models;

use Orchid\Platform\Models\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'color',
        'permissions',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'name',
        'email',
        'permissions',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];


    public static function getLogo()
    {
        $company = DB::table('company')->first();
        if (empty($company))
            return null;
        if (substr($company->logo, 0, 4) === "http")
            return $company->logo;
        return asset('img/' . $company->logo . '');
    }

    public static function getAppName()
    {
        $company = DB::table('company')->first();
        if (empty($company))
            return 'DentistCMS';
        return $company->name;
    }
}
