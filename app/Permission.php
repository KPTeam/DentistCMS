<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = [
        'name', 'slug', 'id',
    ];

    public function roles() {
        return $this->belongsToMany('App\Role','roles_permissions');
     }
}
