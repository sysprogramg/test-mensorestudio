<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'user_id', 'fecha', 'descripcion'
    ];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
