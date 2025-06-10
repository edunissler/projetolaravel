<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SuppliersController extends Controller
{
    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'nome_razao' => 'required',
            'cpf_cnpj' => 'required',
            'telefone' => 'required',
        ]);
        //não esquecer import do Product model.
        Supplier::create([
            'tipo' => $request->tipo,
            'nome_razao' => $request->nome_razao,
            'cpf_cnpj' => $request->cpf_cnpj,
            'telefone' => $request->telefone,
        ]);
        //revisar abaixo depois
        //return redirect('/')->with('success', 'Fornecedor cadastrado com sucesso!');
        return ' <p> Fornecedor salvo com sucesso! </p> ';
    }

    public function index(Request $request)
    {
        //dd($request->all());
        $filter = $request->input('search');
        if ($filter) {
            $suppliers = Supplier::where('nome_razao', 'like', "%$filter%")->get();
        } else {
            return view('suppliers.index', ['suppliers' => Supplier::all()]);
        }

        return view('suppliers.index', [
            'suppliers' => $suppliers,
            'filter' => $filter
        ]);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->update([
            'tipo' => $request->tipo,
            'nome_razao' => $request->nome_razao,
            'cpf_cnpj' => $request->cpf_cnpj,
            'telefone' => $request->telefone,
        ]);
        return redirect('/suppliers')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        //select * from product where id = ?
        $supplier = Supplier::find($id);
        //deleta o produto no banco
        $supplier->delete();
        return redirect('/suppliers')->with('success', 'Produto excluído com sucesso!');

    }



}
