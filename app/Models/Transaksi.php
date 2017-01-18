<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    const STATUS_WAITING_PAYMENT = 1;
    const STATUS_VERIFYING_PAYMENT = 2;
    const STATUS_PAID = 3;
    const STATUS_FINISH = 4;
    const STATUS_CANCELED = 0;

    public function getTotal()
    {
        $total = TransaksiDetail::where('transaksi_id',$this->id)->sum('total');
        return $total;
    }

    public function detail()
    {
        return $this->hasMany('App\Models\TransaksiDetail','transaksi_id');
    }
    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
}
