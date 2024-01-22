<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CDN Tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN sweetalewrt2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CDN fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('titulo')</title>
</head>

<body style="background-color:rgb(153, 194, 237)">
    <!-- NavBar -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('home') }}" @class([
                            'block py-2 px-3 rounded',
                            'text-blue-500' => request()->routeIs('home'),
                        ]) aria-current="page"><i
                                class="fas fa-home mr-2"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="{{route('films.index')}}" @class([
                            'block py-2 px-3 rounded',
                            'text-blue-500' => request()->routeIs('films.*'),
                        ]) aria-current="page">
                            <i class="fas fa-film mr-2"></i> Gestionar Películas
                        </a>
                    </li>
                    <li>
                        <a href="{{route('tags.index')}}" @class([
                            'block py-2 px-3 rounded',
                            'text-blue-500' => request()->routeIs('tags.*'),
                        ]) aria-current="page">
                            <i class="fas fa-tags mr-2"></i> Gestionar Etiquetas
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contacto.formulario')}}" @class([
                            'block py-2 px-3 rounded',
                            'text-blue-500' => request()->routeIs('contacto.*'),
                        ]) aria-current="page">
                            <i class="fa-regular fa-envelope mr-2"></i> Contáctanos
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- FinNavBar -->
    <h1 class="mt-4 mb-2 text-center text-xl">@yield('cabecera')</h1>
    <div class="mx-auto w-3/4 p-8">
        @yield('contenido')
    </div>
    @if (session('info'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('info') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
</body>
</html>