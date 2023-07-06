<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alternatif;
use App\Models\Kriteria;


class DashboardController extends Controller {

    public function index() {
        
        $alternatif= Alternatif::count();
        $kriteria= Kriteria::count();

        return view('main',[
            'title' => 'Dashboard'
        ], compact('alternatif','kriteria'))
        ;  
    }
}
