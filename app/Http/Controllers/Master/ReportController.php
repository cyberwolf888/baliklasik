<?php

namespace App\Http\Controllers\Master;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function period()
    {
        return view('admin/report/period');
    }
    public function index(Request $request)
    {
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));
        $model = Transaksi::whereRaw('created_at >= "'.$start_date.'"')->whereRaw('created_at <= "'.$end_date.'"')->get();

        return view('admin/report/result',[
            'model'=>$model,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
        ]);
    }
}
