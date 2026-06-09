<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Inertia\Inertia;  

class SaleController extends Controller
{
   public function index(Request $request)
{
    $sort = $request->get('sort', 'desc');

    $sales = Sale::with('book')
        ->orderBy('total_price', $sort)
        ->get();

    return Inertia::render('Sales/Index', [ //memanggil file Index.vue yang berada di folder Sales
        'sales' => $sales, //mengirim data penjualan ke view
        'sort' => $sort, //mengirim informasi tentang urutan sort ke view
    ]);
}
}