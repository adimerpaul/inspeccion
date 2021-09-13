<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $fillable=[
        'area',
        'subarea',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function place_sensors(){
        return $this->hasMany(place_sensor::class);
    }
}
