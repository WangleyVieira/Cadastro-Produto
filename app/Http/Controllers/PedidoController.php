<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoStoreRequest;
use App\Http\Requests\PedidoUpdateRequest;
use App\Models\Pedido;
use App\Service\DescontoService;
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
    public function store(PedidoStoreRequest $request)
    {
        try {
            Pedido::create($request->validated());
            Alert::toast('Cadastro realizado com sucesso.', 'success');
            return redirect()->route('pedido.index');
        }
        catch (\Exception $ex) {
            Alert::toast('Ocorreu um erro!', 'error');
            return redirect()->back();
        }
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
    public function update(PedidoUpdateRequest $request, $id)
    {
        try {
            $pedido = Pedido::findOrFail($id);

            $pedido->update($request->validated());
            Alert::toast('Cadastro alterado com sucesso.', 'success');
            return redirect()->route('pedido.index');
        }
        catch (\Exception $ex) {
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
    public function destroy($id)
    {
        try {
            $pedido = Pedido::findOrFail($id);
            $pedido->delete();
            Alert::toast('Cadastro deletado com sucesso.', 'success');
            return redirect()->route('pedido.index');
        }
        catch (\Exception $ex) {
            Alert::toast('Ocorreu um erro!', 'error');
            return redirect()->back();
        }
    }

    public function desconto(Request $request, $id)
    {
        try {
            $pedido = Pedido::findOrFail($id);
            dd($pedido);
            DescontoService::validarDesconto($pedido, $request->desconto);
            $pedido->update([
                'valor' => DescontoService::aplicarDesconto($pedido->valor, $request->desconto)
            ]);
            Alert::toast('Desconto aplicado com sucesso.', 'success');
            return redirect()->route('pedido.index');
        }
        catch (\Exception $ex) {
            Alert::toast($ex->getMessage(), 'error');
            return redirect()->back();
        }
    }
}
