<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HitungController extends Controller
{

    public function hitung(Request $request){

        $kriteria = Kriteria::sum('bobot');

        $bobot1 = 0.2/$kriteria;
        $bobot2 = 0.15/$kriteria;
        $bobot3 = 0.25/$kriteria;
        $bobot4 = 0.25/$kriteria;
        $bobot5 = 0.15/$kriteria;
        $widget1 = [
            'kriteria' => $bobot1,
        ];
        $widget2 = [
            'kriteria' => $bobot2,
        ];
        $widget3 = [
            'kriteria' => $bobot3,
        ];
        $widget4 = [
            'kriteria' => $bobot4,
        ];
        $widget5 = [
            'kriteria' => $bobot5,
        ];


        $Alternatif = Alternatif::get();
        $data = Alternatif::orderby('nama_alternatif', 'asc')->get();

        $minC1 = Alternatif::min('kebutuhan');
        $maxC1 = Alternatif::max('kebutuhan');
        $minC2 = Alternatif::min('ketersediaan');
        $maxC2 = Alternatif::max('ketersediaan');
        $minC3 = Alternatif::min('harga');
        $maxC3 = Alternatif::max('harga');
        $minC4 = Alternatif::min('kualitas');
        $maxC4 = Alternatif::max('kualitas');
        $minC5 = Alternatif::min('waktu');
        $maxC5 = Alternatif::max('waktu');

        $C1min =[
            'alternatif' => $minC1,
        ];
        $C1max =[
            'alternatif' => $maxC1,
        ];
        $C2min =[
            'alternatif' => $minC2,
        ];
        $C2max =[
            'alternatif' => $maxC2,
        ];
        $C3min =[
            'alternatif' => $minC3,
        ];
        $C3max =[
            'alternatif' => $maxC3,
        ];
        $C4min =[
            'alternatif' => $minC4,
        ];
        $C4max =[
            'alternatif' => $maxC4,
        ];
        $C5min =[
            'alternatif' => $minC5,
        ];
        $C5max =[
            'alternatif' => $maxC5,
        ];

        $hasil = $minC1/$maxC1;
        $hasil1 =[
            'alternatif' => $hasil,
        ];

        return view('hitung', compact('hasil1','data', 'widget1', 'widget2', 'widget3', 'widget4', 'widget5', 'C1min', 'C1max', 'C2min', 'C2max', 'C3min', 'C3max', 'C4min', 'C4max', 'C5min', 'C5max'));
    }

}
