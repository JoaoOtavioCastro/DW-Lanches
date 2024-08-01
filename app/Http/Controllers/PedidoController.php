<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedidos::where('user_id', auth()->user()->id)->get();
        return view('pedidos', [
            'pedidos' => $pedidos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pedido_atual = Pedidos::where('user_id', auth()->user()->id)->where('aberto', true)->first();
        if ($pedido_atual) {
            $pedido_atual->aberto = false;
            $pedido_atual->hora_pedido = now();
            $pedido_atual->save();
            $pedido = new Pedidos();
            $pedido->user_id = auth()->user()->id;
            $pedido->aberto = true;
            $pedido->hora_pedido = now();
            $pedido->save();
            return redirect()->route('pedido.show')->with('success', 'Pedido Finalizado com Sucesso!');
        }
        else {
            return redirect()->route('pedido.show')->with('error', 'Algo de Errado não esta certo!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id = null)
    {
        if(Pedidos::where('user_id', auth()->user()->id)->where('aberto', true)->count() == 0) {
            $pedido = new Pedidos();
            $pedido->user_id = auth()->user()->id;
            $pedido->aberto = true;
            $pedido->hora_pedido = now();
            $pedido->save();
            return view('pedido', [
                'pedido' => $pedido,
            ]);
        }else{
        if (!$id) {
            $pedido = Pedidos::where('user_id', auth()->user()->id)->where('aberto', true)->first();
            return view('pedido', [
                'pedido' => $pedido,
            ]);
        }
        $pedido = Pedidos::find($id);
        return view('pedido', [
            'pedido' => $pedido,
        ]);}
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido = Pedidos::find($id);
        if ($pedido->delete()) {
            return redirect()->route('pedido.index')->with('success', 'Pedido deletado com sucesso!');
        } else {
            return redirect()->route('pedido.index')->with('error', 'Erro ao deletar pedido!');
        }
    }
}
