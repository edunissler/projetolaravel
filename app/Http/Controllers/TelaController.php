<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelaController extends Controller
{
    // public function index(Request $request)
    // {
    //     //dd($request->all());
    //     $filter = $request->input('search');
    //     if ($filter) {
    //         $products = Product::where('name', 'like', "%$filter%")->get();
    //     } else {
    //         $products = Product::with('type')
    //             ->orderBy('name', 'asc') // ordena pelo preço
    //             ->get();
    //     }

    //     return view('products.index', [
    //         'products' => $products,
    //         'filter' => $filter
    //     ]);
    // }

    // public function create()
    // {
    //     return view('products.create', [
    //         'types' => Type::all()
    //     ]);
    // }
}
