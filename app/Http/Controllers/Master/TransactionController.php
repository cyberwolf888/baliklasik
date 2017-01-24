<?php

namespace App\Http\Controllers\Master;

use App\Models\Payment;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $model = Transaksi::orderBy('id','DESC')->get();
        return view('admin/transaction/manage',[
            'model'=>$model
        ]);
    }

    public function show($id)
    {
        $model = Transaksi::findOrfail($id);
        return view('admin/transaction/detail',[
            'model'=>$model
        ]);
    }

    public function cancel($id)
    {
        $model = Payment::findOrFail($id);
        $model->status = Payment::STATUS_CANCELED;
        $model->save();

        return redirect()->back();
    }

    public function approve($id)
    {
        $model = Payment::findOrFail($id);
        $model->status = Payment::STATUS_APPROVED;
        $model->save();

        $transaction = Transaksi::findOrFail($model->transaksi_id);
        $transaction->status = Transaksi::STATUS_PAID;
        $transaction->save();

        return redirect()->back();
    }

    public function complete_transaction($id)
    {
        $transaction = Transaksi::findOrFail($id);
        $transaction->status = Transaksi::STATUS_FINISH;
        $transaction->save();

        return redirect()->back();
    }

    public function cancel_transaction($id)
    {
        $transaction = Transaksi::findOrFail($id);
        $transaction->status = Transaksi::STATUS_CANCELED;
        $transaction->save();

        return redirect()->back();
    }
}
