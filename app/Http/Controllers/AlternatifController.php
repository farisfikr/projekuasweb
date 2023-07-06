<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index() {
        return view('dataalternatif', [
            'users' => Alternatif::all(),
            'title' => 'Data alternatif'
        ]);
    }
    public function add() {
        return view('adddataalternatif',[
            'title' => 'Tambah Data alternatif'
        ]);
    }
    public function edit($id){
        
        $alternatif = Alternatif::where('id', $id)->first();

        return view('editalternatif', [
            'alternatif' => $alternatif,
            'title' => 'Edit Data alternatif'
        ]);

    }

    public function update(Request $request, $id) {
        $nama_alternatif      = $request->input('nama_alternatif');
        $kebutuhan   = $request->input('kebutuhan');
        $ketersediaan = $request->input('ketersediaan');
        $harga = $request->input('harga');
        $kualitas = $request->input('kualitas');
        
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->nama_alternatif    = $nama_alternatif;
        $alternatif->kebutuhan = $kebutuhan;
        $alternatif->ketersediaan = $ketersediaan;
        $alternatif->harga = $harga;
        $alternatif->kualitas = $kualitas;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }


    public function dashboard(){
        $alternatif= Alternatif::count();

        return view('main', compact('alternatif'));

    }

    public function store(Request $request) {
        $nama_alternatif     = $request->input('nama_alternatif');
        $kebutuhan = $request->input('kebutuhan');
        $ketersediaan = $request->input('ketersediaan');
        $harga = $request->input('harga');
        $kualitas = $request->input('kualitas');

        $alternatif  = new Alternatif;
        $alternatif->nama_alternatif    = $nama_alternatif;
        $alternatif->kebutuhan = $kebutuhan;
        $alternatif->ketersediaan = $ketersediaan;
        $alternatif->harga = $harga;
        $alternatif->kualitas = $kualitas;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }
    public function delete($id) {
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->delete();
        return redirect()->back();
    }
}
