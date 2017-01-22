<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    const STATUS_WAITING_APPROVED = 1;
    const STATUS_APPROVED = 2;
    const STATUS_CANCELED = 0;

    public function getStatus()
    {
        $status = ['1'=>'Waiting Approved','2'=>'Approved','0'=>'Canceled'];
        return $status[$this->status];
    }

    public function getBank()
    {
        $bank = ['1'=>'BCA','2'=>'Bank Mandiri'];
        return $bank[$this->bank];
    }
}
