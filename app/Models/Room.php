<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'property_id','area_sqm','area_sqft'];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
