<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function index()
    {

        return view('pages.customer.index', [
            'title' => 'Data Pelanggan',

            'customers' => Customer::latest()->filter(request('search'))->paginate(10)->withQueryString()

        ]);
    }

    public function create()
    {

        return view('pages.customer.create', [

            'title' => 'Tambah Data',
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ]);

        $customer = new Customer();
        $customer->nama = $request->nama;
        $customer->gender = $request->gender;
        $customer->alamat = $request->alamat;
        $customer->telepon = $request->telepon;
        $customer->save();

        return redirect()->route('customer.index')->with('status', 'Data ditambah!');
    }

    public function edit($id)
    {
        return view('pages.customer.edit', [
            'customer' => Customer::findOrFail($id),
            'title' => 'Edit Data',
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ]);

        $customer = Customer::findOrFail($request->id);
        $customer->nama = $request->nama;
        $customer->gender = $request->gender;
        $customer->alamat = $request->alamat;
        $customer->telepon = $request->telepon;
        $customer->save();

        return redirect()->route('customer.index')->with('status', 'Data diupdate!');
    }



    public function destroy($id)
    {

        $customer = Customer::findOrFail($id);
        $customer->delete();
        return back()->with('status', 'data terhapus');
    }
}
