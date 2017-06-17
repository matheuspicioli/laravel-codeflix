<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app">
        @php
            $navbar = Navbar::withBrand(config('app.name'), url('/admin/dashboard'))->inverse();
            if(Auth::check()){
                $menus = Navigation::links([
                    ['link' => route('admin.users.index'), 'title' => 'Usuários'],
                    ['link' => route('admin.categories.index'), 'title' => 'Categorias'],
                    ['link' => route('admin.series.index'), 'title' => 'Séries']
                ]);
                $linksDireita = Navigation::links([
                    [
                        Auth::user()->name,
                        [
                            [
                                'link' => route('admin.logout'),
                                'title' => 'Logout',
                                'linkAttributes' => [
                                    'onclick' => "event.preventDefault();document.getElementById(\"form-logout\").submit();"
                                ]
                            ],
                            [
                                'link' => route('admin.user_settings.edit'),
                                'title'=> 'Configurações'
                            ]
                        ]
                    ]
                ])->right();
                $navbar->withContent($menus)->withContent($linksDireita);
            }

            $formLogout = FormBuilder::plain([
                'id'        => 'form-logout',
                'route'     => ['admin.logout'],
                'method'    => 'POST',
                'style'     => 'display:none'
            ]);
        @endphp
        {!! $navbar !!}
        {!! form($formLogout) !!}

        @if(Session::has('message'))
            <div class="container">
                <p class="text-center">
                    {!! Alert::success(Session::get('message'))->close() !!}
                </p>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
