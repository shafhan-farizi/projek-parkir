<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    public function index()
    {
        $kampuses = Kampus::all();

        return view('admin.kampus.index', [
            'kampuses' => $kampuses
        ]);
    }

    public function create()
    {
        return view('admin.kampus.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
        ]);

        Kampus::create($validated);

        return redirect()->route('admin.kampus');
    }

    public function edit($id)
    {
        $kampus = Kampus::find($id);

        return view('admin.kampus.edit', [
            'kampus' => $kampus
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
        ]);

        Kampus::where('id', $id)->update($validated);

        return redirect()->route('admin.kampus');
    }

    public function destroy($id)
    {
        $kampus = Kampus::find($id);

        $kampus->delete();

        return redirect()->route('admin.kampus');
    }
}
