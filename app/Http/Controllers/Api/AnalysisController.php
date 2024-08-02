<?php

namespace App\Http\Controllers\Api; use App\Http\Controllers\Controller; use Illuminate\Http\Request; use Illuminate\Http\Response;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Services\AnalysisService;


class AnalysisController extends Controller
{
    public function index(Request $request)
    {
        $subQuery = Order::betweenDate($request->startDate, $request->endDate);
        
        if($request->type === 'perDay')
        {
            // 配列を受け取り変数に格納するためのlist()を使用
            list($data, $labels, $totals) = AnalysisService::perDay($subQuery);
        }

        if($request->type === 'perMonth')
        {
            // 配列を受け取り変数に格納するためのlist()を使用
            list($data, $labels, $totals) = AnalysisService::perMonth($subQuery);
        }

        if($request->type === 'perYear')
        {
            // 配列を受け取り変数に格納するためのlist()を使用
            list($data, $labels, $totals) = AnalysisService::perYear($subQuery);
        }

        // Ajax通信なのでJsonで返却する必要がある
        return response()->json([
            'data' => $data,
            'type' => $request->type,
            'labels' => $labels,
            'totals' => $totals,
        ], Response::HTTP_OK
        );
        
        // 1.購買ID毎にまとめる
        $subQuery = Order::betweenData($startDate, $endDate)
        ->groupBy('id')
        ->selectRaw('id, customer_id, customer_name, SUM(subtotal) as totalPerPurchase');
        

        // 2.会員毎にまとめて購入金額順にソートする
        $subQuery = DB::table($subQuery)
        ->groupBy('customer_id')
        ->selectRaw('customer_id, customer_name, sum(totalPerPurchase) as total')
        ->orderBy('total', 'desc');
    }

}
