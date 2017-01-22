<?php

namespace App\Http\Controllers\Member;

use App\Models\Payment;
use App\Models\Transaksi;
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
        $model->save();

        return redirect()->route('member.transaction.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
