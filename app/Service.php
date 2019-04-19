<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description'];

    public function service_user() {
        return $this->hasMany(ServiceUser::class);
    }
}
