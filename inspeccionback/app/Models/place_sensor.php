<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class place_sensor extends Model
{
    use HasFactory;
    protected $fillable=[
      'reporte_id',
        'place_id',
        'sensor_id',
    ];
}
