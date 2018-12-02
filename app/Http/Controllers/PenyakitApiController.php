<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\penyakit as penyakitResources;
use App\Http\Resources\gejala as gejalaResources;
use App\Http\Resources\penyakitCollection;
use App\Http\Resources\gejalaCollection;
use App\Penyakit;
use App\Gejala;

class PenyakitApiController extends Controller
{
    public function showPenyakit(Request $request)
    {
        $name = $request->data;
        $penyakit=Penyakit::whereRaw("lower(name) like \"%".$name."%\"");
        foreach ($this->getData($request) as $datum) {
            $penyakit = $penyakit->whereHas('gejalas',function($q) use ($datum){
                $q->where('gejalas.id',$datum);
            });
        }
        return new penyakitCollection($penyakit->orderBy("name")->paginate(15));
        
    }
    public function showGejala(Request $request)
    {
        $name = $request->data;
        $gejala=Gejala::whereRaw("lower(name) like \"%".$name."%\"");
        $gejala=$gejala->whereNotIn('id',$this->getData($request));
        return new gejalaCollection($gejala->orderBy("name")->paginate(15));
        
    }
    public function showSelGejala(Request $request)
    {
        $name = $request->data;
        $gejala=Gejala::whereRaw("lower(name) like \"%".$name."%\"");
        $gejala=$gejala->whereIn('id',$this->getData($request));
        return new gejalaCollection($gejala->orderBy("name")->paginate(15));
        
    }
    private function getData($request){
        $data = json_decode("[".$request->cookie('selected')."]");
        return $data;
    }

}
