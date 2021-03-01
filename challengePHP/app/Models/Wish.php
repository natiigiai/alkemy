<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    use HasFactory;
    protected $primaryKey = 'wishId';

    public function relUser(){
        return $this->belongsTo('\App\Models\User', //modelo
            'id', //foreignKey
            'userId'); //ownerKey
        //hasOne relacion a uno... belongsTo pertenece a una tabla
    }

    public function relApp(){
        return $this->belongsTo('\App\Models\Application', //modelo
            'appId', //foreignKey
            'appId'); //ownerKey
        //hasOne relacion a uno... belongsTo pertenece a una tabla
    }
}
