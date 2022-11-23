<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function serviceType()
    {
    	return $this->belongsToMany(ServiceType::class,'service_type_on_service', 'service_type_id', 'service_id')->withPivot('price');
    }
}
