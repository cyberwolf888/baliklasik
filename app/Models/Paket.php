<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    public function detail()
    {
        return $this->hasMany('App\Models\PaketDetail', 'paket_id');
    }
    public function getStatus()
    {
        $status = ['1' => 'Active', '0' => 'Non Active'];
        return $status[$this->status];
    }
}
