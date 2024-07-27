@extends('layout.main')

@section('content')

    <div class="container-fluid p-2">
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Pedido</h3>
                        <hr class="my-2">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pedido.update', $pedido->id) }}" method="post">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="nome_produto">Nome</label>
                                    <input type="text" class="form-control @error('nome_produto') is-invalid @enderror" name="nome_produto" placeholder="nome do pedido" value="{{ $pedido->nome_produto }}">
                                    @error('nome_produto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="valor">Valor</label>
                                    <input type="text" class="valor form-control @error('valor') is-invalid @enderror" name="valor" placeholder="valor do pedido" value="{{ $pedido->valor }}">
                                    @error('valor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="data_vencimento">Data de vencimento</label>
                                    <input type="date" class="form-control @error('data_vencimento') is-invalid @enderror" name="data_vencimento" value="{{ $pedido->data_vencimento }}">
                                    @error('data_vencimento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="submit-button btn btn-primary m-1">Salvar</button>
                                    <a href="{{ route('pedido.index') }}" class="btn btn-secondary">Voltar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.valor').mask('00.000.000,00', {reverse: true});
    </script>
@endsection




