<?php

namespace App\Http\Controllers\Master;

use App\Models\Paket;
use App\Models\PaketDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaketController extends Controller
{
    public function index()
    {
        $model = Paket::all();
        return view('admin/paket/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Paket();
        return view('admin/paket/form',[
            'model'=>$model,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'status' => 'required|numeric',
            'deskripsi' => 'required|max:255',
        ]);

        $paket = new Paket();
        $paket->nama = $request->nama;
        $paket->harga = $request->harga;
        $paket->status = $request->status;
        $paket->deskripsi = $request->deskripsi;
        $paket->save();

        foreach ($request->detail as $row){
            $detail_paket = new PaketDetail();
            $detail_paket->paket_id = $paket->id;
            $detail_paket->value = $row;
            $detail_paket->save();
        }

        return redirect()->route('admin.paket.manage');
    }

    public function show($id)
    {
        $model = Paket::findOrFail($id);
        return view('admin/paket/detail',[
            'model'=>$model
        ]);
    }

    public function edit($id)
    {
        $model = Paket::findOrFail($id);
        return view('admin/paket/form',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'status' => 'required|numeric',
            'deskripsi' => 'required|max:255',
        ]);

        $paket = Paket::findOrFail($id);
        $paket->nama = $request->nama;
        $paket->harga = $request->harga;
        $paket->status = $request->status;
        $paket->deskripsi = $request->deskripsi;
        $paket->save();

        PaketDetail::where('paket_id', $paket->id)->delete();

        foreach ($request->detail as $row){
            $detail_paket = new PaketDetail();
            $detail_paket->paket_id = $paket->id;
            $detail_paket->value = $row;
            $detail_paket->save();
        }

        return redirect()->route('admin.paket.manage');
    }

    public function destroy($id)
    {
        $model = Paket::findOrFail($id);
        PaketDetail::where('paket_id', $model->id)->delete();
        $model->delete();
        return redirect()->back();
    }
}
