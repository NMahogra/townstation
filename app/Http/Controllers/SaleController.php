<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'desc');

        $sales = Sale::with('book')
            ->orderBy('total_price', $sort)
            ->get();

        return view('sales.index', compact('sales'));
    }
}