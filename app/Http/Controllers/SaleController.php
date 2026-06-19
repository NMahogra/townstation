<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Sales/Index');
    }

    public function getData(Request $request) {
      // balikin data json berupa sales sesuai filter asc or desc 
    }

    public function create()
    {
        //  ke view create agar user bisa buat sales by bukunya
    }

    public function store(Request $request)
    {
        //store data, validasi data, kalau susces return ke index
    }

    public function edit(Sale $sale)
    {
       // edit data
    }

    public function update(Request $request, Sale $sale)
    {
       // untuk update data
    }

    public function destroy(Sale $sale)
    {
       //hapus data terus redirect ke page sales index
    }
}
