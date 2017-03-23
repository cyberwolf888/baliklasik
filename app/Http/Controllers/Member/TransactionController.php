<?php

namespace App\Http\Controllers\Member;

use App\Models\Items;
use App\Models\Payment;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;

class TransactionController extends Controller
{

    public function index()
    {
        $model = Transaksi::where('member_id', Auth::user()->member->id)->get();
        return view('member.transaction.index',[
            'model'=>$model
        ]);
    }

    public function create_payment($id)
    {
        $payment = new Payment();
        return view('member/transaction/payment',[
            'payment'=>$payment,
            'id'=>$id
        ]);
    }

    public function store_payment(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image|max:3500',
            'total_transfer' => 'required|max:255',
            'date_transfer' => 'required|date'
        ]);
        $path = base_path('images/payment/');
        $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        $model = new Payment();
        $model->transaksi_id = $id;
        $model->image = $file->basename;
        $model->total_transfer = $request->total_transfer;
        $model->date_transfer = date('Y-m-d',strtotime($request->date_transfer));
        $model->bank = $request->bank;
        $model->status = Payment::STATUS_WAITING_APPROVED;
        $model->type = $request->type;
        $model->save();

        return redirect()->route('member.transaction.manage');
    }

    public function create_items($id)
    {
        return view('member/transaction/item',[
            'id'=>$id
        ]);
    }

    public function store_item(Request $request, $id)
    {
        $this->validate($request, [
            'item' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);

        $item = Items::findOrFail($request->item);
        $detail = new TransaksiDetail();
        $detail->transaksi_id = $id;
        $detail->item = $item->nama;
        $detail->qty = $request->qty;
        $detail->harga = $item->harga;
        $detail->total = $detail->qty*$detail->harga;
        $detail->save();

        return redirect()->route('member.transaction.manage');
    }

    public function getTotalItem(Request $request)
    {
        $item = Items::findOrFail($request->item);
        $total = number_format($item->harga * $request->qty,0,',','.');
        return response()->json(['total'=>$total]);
    }
}
