<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    //
    public function penyakits()
    {
        return $this->belongsToMany('App\Penyakit','listgejala');
    }
    public function penyakit()
    {
        return $this->belongsToMany('App\Penyakit', 'penyakits', 'gejala_id', 'penyakit_id');
    }
    public function listPenyakit(){
        return $this->hasMany('App\ListGejala');
    }
}
