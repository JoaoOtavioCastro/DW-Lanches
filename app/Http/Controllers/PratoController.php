<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prato;
use App\Models\User;

class PratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public readonly Prato $prato;

    public function index()
    {
        $pratos = Prato::all();

        return view("pratos", [
            'pratos' => $pratos,
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
        $prato = new Prato();
        $prato->nome = $request->nome;
        $prato->descricao = $request->descricao;
        $prato->disponibilidade = $request->disponibilidade;
        $prato->preco = $request->preco;
        $prato->user_id = auth()->user()->id;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->imagem;
            $imageName = md5($requestImage->getclientOriginalName() . strtotime("now")) . "." . $requestImage->getClientOriginalExtension();
            $request->imagem->move(public_path('/img/pratos'), $imageName);
            $prato->imagem = $imageName;
        }
        $criado = $prato->save();

        if ($criado) {
             return redirect()->route('prato.index')->with('success', 'Prato criado com sucesso!');
         } else {
            return redirect()->route('prato.index')->with('error', 'Erro ao criar prato!');
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prato = Prato::find($id);
        $nome_autor = $prato->user->name;
        return view('prato', ['prato' => $prato, 'nome_autor' => $nome_autor]);
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


        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/pratos'), $imageName);

            $imagem = $imageName;

        } else {
            $imagem = $request->imagem_anterior;
        }
        $editado =  $this->prato->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'disponibilidade' => $request->disponibilidade,
            'imagem' => $imagem,
            'preco' => $request->preco,
        ]);
        if($editado){
            return redirect()->route('prato.index')->with('success', 'Prato editado com sucesso!');
        }else{
            return redirect()->route('prato.index')->with('error', 'Erro ao editar prato!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->prato = Prato::find($id);
        if ($this->prato->delete()) {
            
            return redirect()->route('prato.index')->with('success', 'Prato deletado com sucesso!');
        } else {
            return redirect()->back('prato.index')->with('error', 'Erro ao deletar prato!');
        }
    }
}
