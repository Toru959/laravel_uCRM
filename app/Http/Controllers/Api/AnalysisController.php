<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;


class AnalysisController extends Controller
{
    public function index(Request $request)
    {
        // Ajax通信なのでJsonで返却する必要がある
        return response()->json([
            'data' => $request->startDate
        ], Response::HTTP_OK 
        );
    }
}
