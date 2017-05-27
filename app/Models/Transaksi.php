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

    public function getTotalPaid()
    {
        $total = Payment::where('transaksi_id',$this->id)->where('status',Payment::STATUS_APPROVED)->sum('total_transfer');
        return $total;
    }

    public function getStatus()
    {
        $status = ['0'=>'Cancelled','1'=>'Waiting Payment','2'=>'Verifying Payment','3'=>'Paid','4'=>'Finish'];
        return $status[$this->status];
    }

    public function getLabel()
    {
        $label = TransaksiDetail::where('transaksi_id',$this->id)->first()->item;
        return $label;
    }

    public function detail()
    {
        return $this->hasMany('App\Models\TransaksiDetail','transaksi_id');
    }
    public function payment()
    {
        return $this->hasMany('App\Models\Payment','transaksi_id');
    }
    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }

    public function getSize($tinggi, $berat)
    {
        if($tinggi>=150 && $tinggi<=165 && $berat>=40 && $berat<=55){
            return 'S';
        }elseif ($tinggi>=150 && $tinggi<=175 && $berat>=50 && $berat<=60){
            return 'M';
        }elseif ($tinggi>=160 && $tinggi<=185 && $berat>=55 && $berat<=75){
            return 'L';
        }elseif ($tinggi>=165 && $tinggi<=190 && $berat>=65 && $berat<=90){
            return 'XL';
        }else{
            return 'XXL';
        }
    }

    public function getSizeDetail($ukuran)
    {
        $size = [
            'S'=>'S (Panjang = 65 cm, Lebar = 40 cm)',
            'M'=>'M (Panjang = 68 cm, Lebar = 45 cm)',
            'L'=>'L (Panjang = 70 cm, Lebar = 50 cm)',
            'XL'=>'XL (Panjang = 73 cm, Lebar = 55 cm)'
        ];

        return $size[$ukuran];
    }
}
