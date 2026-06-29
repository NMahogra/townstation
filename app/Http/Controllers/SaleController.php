<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Book;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Sales/Index');
    }

    public function getData(Request $request) {
      $sort = $request->get('sort', 'desc');

    $sales = Sale::with('book') 
                ->orderBy('quantity', $sort)
                ->get();

    return response()->json($sales);   // balikin data json berupa sales sesuai filter asc or desc 
    }

    public function create()
    {
        return Inertia::render('Sales/Create',[
        'books'=>Book::all()
    ]);//  ke view create agar user bisa buat sales by bukunya
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'book_id'=>'required|exists:books,id',
        'quantity'=>'required|integer|min:1',
        'total_price'=>'required|numeric'
    ]);

    Sale::create($validated);

    return redirect()->route('sales.index');    //store data, validasi data, kalau susces return ke index
    }

    public function edit(Sale $sale)
    {
       return Inertia::render('Sales/Edit',[
        'sale'=>$sale,
        'books'=>Book::all()
    ]);// edit data
    }

    public function update(Request $request, Sale $sale)
    {
       $validated = $request->validate([
        'book_id'=>'required|exists:books,id',
        'quantity'=>'required|integer|min:1',
        'total_price'=>'required|numeric'
    ]);

    $sale->update($validated);

    return redirect()->route('sales.index');// untuk update data
    }

    public function destroy(Sale $sale)
    {
       $sale->delete();
       return redirect()->route('sales.index'); //hapus data terus redirect ke page sales index
    }
}
