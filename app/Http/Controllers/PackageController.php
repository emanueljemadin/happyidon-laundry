<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return view('pages.package.index', [
            'title' => 'Data Paket',
            'packages' => Package::latest()->filter(request('search'))->paginate(10)->withQueryString()

        ]);
    }

    public function show($id)
    {
        if (request()->ajax()) {
            $package = Package::find($id);
            return response()->json(['data' => $package]);
        }
    }


    public function create()
    {

        return view('pages.package.create', [
            'title' => 'Tambah Data',
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $package = new Package();
        $package->nama = $request->nama;
        $package->harga = $request->harga;
        $package->save();

        return redirect()->route('package.index')->with('status', 'Data ditambah!');
    }

    public function edit($id)
    {
        return view('pages.package.edit', [
            'customer' => Package::findOrFail($id),
            'title' => 'Edit Data',
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $package = Package::findOrFail($request->id);
        $package->nama = $request->nama;
        $package->harga = $request->harga;
        $package->save();

        return redirect()->route('package.index')->with('status', 'Data diupdate!');
    }



    public function destroy($id)
    {

        $package = Package::findOrFail($id);
        $package->delete();
        return back()->with('status', 'data terhapus');
    }
}
