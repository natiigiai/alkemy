<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $primaryKey = 'appId';

    public function relUser(){
        return $this->belongsTo('\App\Models\User', //modelo
            'id', //foreignKey
            'userId'); //ownerKey
        //hasOne relacion a uno... belongsTo pertenece a una tabla
    }

    public function relCategory(){
        return $this->belongsTo('\App\Models\Category', //modelo
            'categoryId', //foreignKey
            'categoryId'); //ownerKey
        //hasOne relacion a uno... belongsTo pertenece a una tabla
    }
}
