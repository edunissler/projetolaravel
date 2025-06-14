<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->all());
        $filter = $request->input('search');
        if ($filter) {
            $products = Product::where('name', 'like', "%$filter%")->get();
        } else {
            $products = Product::with('type')
                ->orderBy('name', 'asc') // ordena pelo preço
                ->get();
        }

        return view('products.index', [
            'products' => $products,
            'filter' => $filter
        ]);

    }

    public function home(Request $request)
    {
        // $products = Product::where('quantity', '>', 0)
        //     ->where('price', '>', 0)
        //     ->get();

        // return view('welcome', [
        //     'products' => $products
        // ]);

        $typeId = $request->query('type');

        $productsQuery = Product::where('quantity', '>', 0)
            ->where('price', '>', 0);

        if ($typeId) {
            $productsQuery->where('type_id', $typeId);
        }

        $products = $productsQuery->get();

        return view('welcome', [
            'products' => $products,
            'types' => Type::all(),
            'selectedType' => $typeId,
        ]);
    }

    /*$products = DB::select("SELECT name, price FROM products WHERE price > ?", [100]);*/

    /*$results = DB::table('products')
    ->join('types', 'types.id', '=', 'products.type_id')
    ->select('products.*', 'types.name as type_name')
    ->get();*/

    /*$data = json_decode(json_encode($stdObject), true);*/

    public function create()
    {
        return view('products.create', [
            'types' => Type::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'quantity' => 'required|gt:0',
            'price' => 'required|gt:0',
            //'type_id' => 'required|exists:types,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'image' => $imagePath,
        ]);
        return redirect('/products')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product, 'types' => Type::all()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'quantity' => 'required|gt:0',
            'price' => 'required|gt:0',
            'type_id' => 'required|exists:types,id',
        ]);

        $product = Product::find($request->id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image; // mantém a imagem existente
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'image' => $imagePath,
        ]);
        return redirect('/products')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('success', 'Produto excluído com sucesso!');
    }
}
