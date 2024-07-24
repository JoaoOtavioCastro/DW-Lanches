<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prato;

class PratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public readonly Prato $prato;

    public function index()
    {
        return view("pratos", [
            'pratos' => Prato::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prato_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = auth()->user();
        $prato = new Prato();
        $prato->nome = $request->nome;
        $prato->descricao = $request->descricao;
        $prato->disponibilidade = $request->disponibilidade;
        $prato->user_id = auth()->user()->id;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->image;
            $imageName = md5($requestImage->getclientOriginalName() . strtotime("now")) . "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images'), $imageName);
            $prato->imagem = $imageName;
        }
        $criado = $prato->save();

        if ($criado) {
            return redirect()->back()->with('success', 'Prato criado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao criar prato!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prato = Prato::find($id);
        return view('prato', ['prato' => $prato]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prato = Prato::find($id);
        return view('prato_edit', ['prato' => $prato]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->prato = Prato::find($id);


        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->imagem;
            $imageName = md5($requestImage->getclientOriginalName() . strtotime("now")) . "." . $request->imagem->getClientOriginalExtension();
            $request->imagem->move(public_path('/images'), $imageName);
            $imagem = $imageName;
        }else{
            $imagem = $request->imagem_anterior;
        }
        $this->prato->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'disponibilidade' => $request->disponibilidade,
            'imagem' => $imagem,
            'preco' => $request->preco,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->prato = Prato::find($id);
        if($this->prato->delete()) {
            return redirect()->route('prato.index')->with('success', 'Prato deletado com sucesso!');
        } else {
            return redirect()->back('prato.index')->with('error', 'Erro ao deletar prato!');
        }
    }
}
