<?php

namespace App\Http\Controllers\Api; use App\Http\Controllers\Controller; use Illuminate\Http\Request; use Illuminate\Http\Response;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Services\AnalysisService;
use App\Services\DecileService;
use App\Services\RFMService;

class AnalysisController extends Controller
{
    public function index(Request $request)
    {
        $subQuery = Order::betweenDate($request->startDate, $request->endDate);
        
        if($request->type === 'perDay')
        {
            list($data, $labels, $totals) = AnalysisService::perDay($subQuery);
        }

        if($request->type === 'perMonth')
        {
            list($data, $labels, $totals) = AnalysisService::perMonth($subQuery);
        }

        if($request->type === 'perYear')
        {
            list($data, $labels, $totals) = AnalysisService::perYear($subQuery);
        }

        if($request->type === 'decile')
        {
            list($data, $labels, $totals) = DecileService::decile($subQuery);
        }

        if($request->type === 'rfm')
        {
            list($data, $totals, $eachCount) = RFMService::rfm($subQuery, $request->rfmPrms);

            return response()->json([
                'data' => $data,
                'type' => $request->type,
                'eachCount' => $eachCount,
                'totals' => $totals,
            ], Response::HTTP_OK);
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
