<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <title>Cadastro de Produtos</title>
        <link rel="shortcut icon" type="svg" href="{{ asset('image/layer-group-solid.svg') }}" style="color: #4a88eb">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.0/r-2.2.9/rr-1.2.8/datatables.min.css"/>
        <link href="{{asset('select2-4.1.0/dist/css/select2.min.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('select2-bootstrap/dist/select2-bootstrap.css')}}"/>
        <script src="{{ asset('js/jquery.js') }}"></script>

        <style>
            .error{
                color:red
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="main">

                <main class="content">
                    @yield('content')
                </main>

            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('jquery-mask/dist/jquery.mask.min.js')}}"></script>
        <script src="{{ url('js/fontawesome.js') }}"></script>
        <script src="{{ url('js/bootstrap.js') }}"></script>
        <script src="{{ url('js/functions.js') }}"></script>
        <script src="{{ url('js/prevent_multiple_submits.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.0/r-2.2.9/rr-1.2.8/datatables.min.js"></script>
        <script src="{{asset('select2-4.1.0/dist/js/select2.min.js')}}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script src="{{asset('jquery-mask/src/jquery.mask.js')}}"></script>

        @yield('scripts')
    </body>
</html>
