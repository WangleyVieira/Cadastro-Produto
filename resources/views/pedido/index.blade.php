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
                                <table id="datatables-reponsive" class="table table-bordered" style="width: 100%;">
                                    <thead class="table-light">
                                        <tr style="text-align: center">
                                            <th scope="col">Nome do pedido</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Data de vencimento</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pedidos as $pedido)
                                            <tr style="text-align: center">
                                                <td>{{ $pedido->nome_produto != null ? $pedido->nome_produto : null }}</td>
                                                <td>{{ $pedido->valor != null ? $pedido->valorFormatado() : null }}</td>
                                                <td>{{ $pedido->data_vencimento != null ? $pedido->dataFormatado() : '-' }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-{{ $pedido->definirCorBadge()['cor'] }}">{{ $pedido->definirCorBadge()['status'] }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('pedido.edit', $pedido->id) }}"><i class="fas fa-fw fa-pen"></i></a>
                                                </td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#modalDeletar{{ $pedido->id }}"><i class="fas fa-fw fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalDeletar{{ $pedido->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">ATENÇÃO!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('pedido.destroy', $pedido->id) }}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Deletar o pedido <span>{{ $pedido->nome_produto }}</span>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    <p>Não há pedidos registrados.</p>
                                                </td>
                                            </tr>
                                        @endforelse
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatables-reponsive').dataTable({
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por página",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                    "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sSearch": "Pesquisar: ",
                    "oPaginate": {
                        "sFirst": "Início",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                },
            });
        });
    </script>
@endsection




