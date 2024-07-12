<?php

namespace App\Http\Controllers;

use App\Models\AreaParkir;
use App\Models\Kampus;
use Illuminate\Http\Request;

class AreaParkirController extends Controller
{
    public function index() {
        $area_parkir = AreaParkir::all();

        return view('admin.area_parkir.index', [
            'area_parkir' => $area_parkir
        ]);
    }

    public function create() {
        $kampuses = Kampus::orderBy('nama')->get();

        return view('admin.area_parkir.add', [
            'kampuses' => $kampuses
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
            'kampus_id' => 'required',
            'kapasitas' => 'required',
            'keterangan' => 'required',
        ]);

        AreaParkir::create($validated);

        return redirect()->route('admin.area-parkir');
    }

    public function edit($id) {
        $area_parkir = AreaParkir::find($id);
        $kampuses = Kampus::orderBy('nama')->get();

        return view('admin.area_parkir.edit', [
            'area_parkir' => $area_parkir,
            'kampuses' => $kampuses
        ]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nama' => 'required',
            'kapasitas' => 'required',
            'keterangan' => 'required',
            'kampus_id' => 'required',
        ]);

        AreaParkir::where('id', $id)->update($validated);

        return redirect()->route('admin.area-parkir');
    }

    public function destroy($id) {
        $area_parkir = AreaParkir::find($id);

        $area_parkir->delete();

        return redirect()->route('admin.area-parkir');
    }
}
