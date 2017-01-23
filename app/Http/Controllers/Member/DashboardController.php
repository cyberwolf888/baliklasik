<?php

namespace App\Http\Controllers\Member;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $total_wedding = Transaksi::where('member_id',Auth::user()->member->id)->count('id');
        $wedding = Transaksi::where('member_id', Auth::user()->member->id)->get();
        $total = 0;
        $total_paid = 0;
        foreach ($wedding as $row){
            $total+=$row->getTotal();
            $total_paid+=$row->getTotalPaid();
        }
        return view('member/dashboard/index',[
            'total_wedding'=>$total_wedding,
            'total'=>$total,
            'total_paid'=>$total_paid
        ]);
    }
}
