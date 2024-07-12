<?php

namespace App\Http\Controllers;

use App\Models\AreaParkir;
use App\Models\Kendaraan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function getNoPol() {
        $transaksi = Transaksi::where('keterangan', 'Belum Bayar')->distinct()->get(['kendaraan_id']);
        $kendaraan = Kendaraan::all(['nopol']);

        $kendaraanNopol = [];
        foreach ($kendaraan as $k) {
            array_push($kendaraanNopol, $k['nopol']);
        }

        $nopol = [];
        foreach ($transaksi as $t) {
            array_push($nopol, $t->kendaraan->nopol);
        }

        $nopolSeparated = array_values(array_diff($kendaraanNopol, $nopol));

        return response()->json($nopolSeparated);
    }

    public function getChecked() {
        $transaksi = Transaksi::where('keterangan', 'Belum Bayar')->get();

        $data = [];

        foreach ($transaksi as $t) {
            array_push($data, [$t->id, $t->kendaraan->nopol]);
        }

        return response()->json($data);
    }

    public function kendaraanDetail($nopol) {
        $kendaraan = Kendaraan::where('nopol', $nopol)->first();

        $kendaraan->jenis;

        return response()->json([$kendaraan]);
    }
    
    public function index()
    {
        $transaksis = Transaksi::orderByRaw("FIELD(keterangan, 'Belum Bayar', 'Terbayar')")->orderBy('tanggal')->get();
        
        foreach ($transaksis as $transaksi) {
            if($transaksi['keterangan'] == 'Belum Bayar') {
                $transaksi['biaya_sementara'] = number_format(self::parkingSystem($transaksi->tanggal, $transaksi['mulai'], date('H:i')));
            } else {
                $transaksi['biaya'] = number_format($transaksi->biaya);
            }
        }

        return view('admin.transaksi.index', [
            'transaksis' => $transaksis
        ]);
    }

    public function checkIn() {
        $area_parkir = AreaParkir::all();
    
        return view('admin.check.in', [
            'area_parkir' => $area_parkir
        ]);
    }

    public function checkInLogic($kendaraan_id, $area_parkir_id) {
        $transaksi = Transaksi::where('kendaraan_id', $kendaraan_id)->where('keterangan', 'Belum Bayar')->get();

        if($transaksi != '[]') {
            return redirect()->back();
        }

        Transaksi::create([
            'tanggal' => date('Y-m-d'),
            'mulai' => date('H:i'),
            'kendaraan_id' => $kendaraan_id,
            'area_parkir_id' => $area_parkir_id,
        ]);

        return redirect()->back();
    }

    public function checkOut() {
        return view('admin.check.out');
    }

    public function checkOutLogic($id) {
        $transaksi = Transaksi::find($id);

        $transaksi->update([
            'akhir' => date('H:i'),
            'keterangan' => 'Terbayar',
            'biaya' => self::parkingSystem($transaksi->tanggal, $transaksi->mulai, date('H:i'))
        ]);

        return redirect()->back();
    }

    public function transaksiDetail($id) {
        $transaksi = Transaksi::find($id);

        $transaksi->kendaraan;
        $transaksi->area_parkir;

        $transaksi['mulai'] = date('H:i', strtotime($transaksi->mulai));
        $transaksi['akhir'] = date('H:i');
        $transaksi['biaya'] = number_format(self::parkingSystem($transaksi->tanggal, $transaksi->mulai, $transaksi->akhir));
        
        return response()->json([$transaksi]);
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->delete();

        return redirect()->route('admin.transaksi');
    }

    public function parkingSystem($date, $timeStart, $timeEnd) {
        $curDate = date('Y-m-d');
        $start = Carbon::parse("$date $timeStart");
        $end = Carbon::parse("$curDate $timeEnd");

        $selisih_waktu = round($start->diffInHours($end));

        $biaya = 2000;
        if($selisih_waktu > 2) {
            $biaya += (($selisih_waktu - 2) * 1000);
        }

        return $biaya;
    }
}
