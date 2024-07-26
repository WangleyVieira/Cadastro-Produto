@extends('layout.main')

@section('content')

    <div class="container-fluid p-0">
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('sweetalert::alert')
                        <div class="card-header">
                            <h3>Listagem dos Pedidos</h3>
                            <hr class="my-4">
                        </div>

                        <div class="card-body">
                            <div class="table-responsive" style="width: 100%;">
                                <table class="table table-bordered text-center" style="width: 100%" id="datatables-reponsive">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Nome do pedido</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Data de vencimento</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pedidos as $pedido)
                                            <tr>
                                                <td>{{ $pedido->nome_produto != null ? $pedido->nome_produto : null }}</td>
                                                <td>{{ $pedido->valor != null ? $pedido->valor : null }}</td>
                                                <td>{{ date( 'd/m/Y' , strtotime($pedido->data_vencimento)) }}</td>
                                                <td>
                                                    <a href="{{ route('pedido.edit', $pedido->id) }}"><i class="fas fa-fw fa-pen"></i></a>
                                                </td>
                                                <td>
                                                    <a href="http://"><i class="fas fa-fw fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('pedido.create') }}" class="btn btn-success">Cadastrar novo pedido</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




