<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {
        return view('frontend/transaksi',[
            'id'=>$id
        ]);
    }

    public function store(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);
        $transksi = new Transaksi();
        $transksi->member_id = Auth::user()->member->id;
        $transksi->wedding_date = date('Y-m-d', strtotime($request->wedding_date));
        $transksi->city = $request->city;
        $transksi->alamat = $request->alamat;
        $transksi->status = 1;
        $transksi->save();

        $detail = new TransaksiDetail();
        $detail->transaksi_id = $transksi->id;
        $detail->item = $paket->nama;
        $detail->qty = 1;
        $detail->harga = $paket->harga;
        $detail->total = $detail->qty*$detail->harga;
        $detail->save();

        return redirect()->route('invoice',$transksi->id);
    }

    public function invoice($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('frontend/invoice',[
            'transaksi'=>$transaksi
        ]);
    }

}
