<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceUser extends Model
{
    protected $fillable = ['name', 'email', 'tel', 'service_id'];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
