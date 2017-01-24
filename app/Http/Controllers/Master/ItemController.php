<?php

namespace App\Http\Controllers\Master;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index()
    {
        $model = Items::all();
        return view('admin/item/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Items();
        return view('admin/item/form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'harga' => 'required|numeric',
            'satuan' => 'required|max:100'
        ]);

        $model = new Items();
        $model->nama = $request->nama;
        $model->harga = $request->harga;
        $model->satuan = $request->satuan;
        $model->save();

        return redirect()->route('admin.item.manage');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = Items::findOrFail($id);
        return view('admin/item/form',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'harga' => 'required|numeric',
            'satuan' => 'required|max:100'
        ]);

        $model = Items::findOrFail($id);
        $model->nama = $request->nama;
        $model->harga = $request->harga;
        $model->satuan = $request->satuan;
        $model->save();

        return redirect()->route('admin.item.manage');
    }

    public function destroy($id)
    {
        $model = Items::findOrFail($id);
        $model->delete();

        return redirect()->back();
    }
}
