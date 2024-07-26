<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Models\Pedido;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pedidos = Pedido::orderBy('data_vencimento', 'asc')->get();
            return view('pedido.index', compact('pedidos'));
            Alert::success('Título', 'Mensagem de sucesso');

            return redirect()->back();

        }
        catch (\Exception $ex) {
            Alert::toast('Ocorreu um erro!', 'error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('pedido.create');
        }
        catch (\Exception $ex) {
            Alert::toast('Ocorreu um erro!', 'error');
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        try {
            Pedido::create($request->validated());
            Alert::toast('Cadastro realizado com sucesso.', 'success');
            return redirect()->route('pedido.index');
        }
        catch (\Exception $ex) {
            // return $ex->getMessage();
            Alert::toast('Ocorreu um erro!', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $pedido = Pedido::findOrFail($id);
            return view('pedido.edit', compact('pedido'));
        }
        catch (\Exception $ex) {
            Alert::toast('Ocorreu um erro!', 'error');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoRequest $request, $id)
    {
        try {
            $pedido = Pedido::findOrFail($id);

            $pedido->update($request->validated());
            Alert::toast('Cadastro alterado com sucesso.', 'success');
            return redirect()->route('pedido.index');
        }
        catch (\Exception $ex) {
            // return $ex->getMessage();
            Alert::toast('Ocorreu um erro!', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
