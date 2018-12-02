<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListGejala extends Model
{
    public function __construct(){
        $this->table="listgejala";
        parent::__construct();
    }

}
