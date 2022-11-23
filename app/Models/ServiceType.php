<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service()
    {
    	return $this->belongsToMany(Service::class,'service_type_on_service', 'service_id', 'service_type_id');
    }
}
