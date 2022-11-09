<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!--Header section-->
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                DevStagram
            </h1>

            <!--Navigation section-->
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600" href="#">Login</a>
                <a class="font-bold uppercase text-gray-600" href="/register">Crear Cuenta</a>
            </nav>
        </div>
    </header>

    <!--Main section-->
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <!--Footer section-->
    <footer class="mt-10 text-center p-5 text-gray-500 font-bold">
        DevStagram - Todos los derechos reservados {{date('Y')}}
    </footer>
</body>
</html>