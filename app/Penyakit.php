<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    public function gejalas()
    {
        return $this->belongsToMany('App\Gejala','listgejala');
    }
    public function gejala()
    {
        return $this->belongsToMany('App\Gejala', 'gejalas', 'penyakit_id', 'gejala_id');
    }
    public function listGejala(){
        return $this->hasMany('App\ListGejala');
    }
}
