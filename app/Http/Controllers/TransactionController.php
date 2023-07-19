<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.index', [
            'title' => 'Data Transaksi',
            'transactions' => Transaction::latest()->filter(request('search'))->paginate(10)->withQueryString()

        ]);
    }

    public function create()
    {
        return view('pages.transaction.create', [
            'title' => 'Tambah Data',
            'customers' => Customer::latest()->get(),
            'packages' => Package::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'pelanggan' => 'required',
            'tanggal_in' => 'required',
            'tanggal_out' => 'required',
            'berat' => 'required|numeric',
            'paket' => 'required',
        ]);

        $transaksi = new Transaction();
        $transaksi->customer_id = $request->pelanggan;
        $transaksi->tanggal_in = $request->tanggal_in;
        $transaksi->tanggal_out = $request->tanggal_out;
        $transaksi->total_biaya = $request->total_biaya;
        $transaksi->package_id = $request->paket;
        $transaksi->berat = $request->berat;
        $transaksi->save();

        return redirect()->route('transaction.index')->with('status', 'Transaksi berhasil!');
    }


    public function confirm($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status_ambil = $transaction->status_ambil == '1' ? '0' : '1';
        $transaction->save();

        return redirect()->route('transaction.index')->with('status', 'status terupdate!');
    }
}
