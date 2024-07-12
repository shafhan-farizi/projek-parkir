<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kendaraan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KendaraanController extends Controller
{
    public function index() {
        $kendaraans = Kendaraan::all();

        return view('admin.kendaraan.index', [
            'kendaraans' => $kendaraans
        ]);
    }

    public function create() {
        $jenis_kendaraan = Jenis::all();

        return view('admin.kendaraan.add', [
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    public function store(Request $request) {
        $kendaraan = Kendaraan::where('pemilik', $request->pemilik)->get();

        if($kendaraan == '[]') {
            $validated = $request->validate([
                'merk' => 'required',
                'pemilik' => 'required',
                'nopol' => 'required',
                'thn_beli' => 'required',
                'deskripsi' => 'required',
                'jenis_kendaraan_id' => 'required',
                'kapasitas_kursi' => 'required',
            ]);
    
            try {
                Kendaraan::create($validated);
            } catch(Exception $e) {
                return redirect()->back();
            }
        }

        if($request->uri) {
            return redirect()->route('registrasi-kendaraan');
        }
        return redirect()->route('admin.kendaraan');
    }

    // for user only
    public function registrasiKendaraan() {
        $kendaraan = Kendaraan::where('pemilik', Auth::user()->username)->get();
        $jenis_kendaraan = Jenis::all();

        $sudahRegis = $kendaraan != '[]' ? true : false;

        return view('regisKendaraan', [
            'jenis_kendaraan' => $jenis_kendaraan,
            'sudah_regis' => $sudahRegis
        ]);
    }

    public function edit($id) {
        $kendaraan = Kendaraan::find($id);
        $jenis_kendaraan = Jenis::all();

        return view('admin.kendaraan.edit', [
            'kendaraan' => $kendaraan,
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'merk' => 'required',
            'pemilik' => 'required',
            'nopol' => 'required',
            'thn_beli' => 'required',
            'deskripsi' => 'required',
            'jenis_kendaraan_id' => 'required',
            'kapasitas_kursi' => 'required',
        ]);
        Kendaraan::where('id', $id)->update($validated);

        return redirect()->route('admin.kendaraan');
    }

    public function destroy($id) {
        $kendaraan = Kendaraan::find($id);

        $kendaraan->delete();

        return redirect()->route('admin.kendaraan');
    }
}
