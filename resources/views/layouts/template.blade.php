<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('Decarthon_ico.png')}}" type="image/x-icon"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>
<body>
    <header class="border-b-5 border-blue-500 p-3 font-bold" style="border-bottom:5px solid rgb(30, 64, 175);">    
    <div style="" class="flex justify-center items-center">
            <a href="/"><img src="{{asset('Decarthon_Logo.png')}}" alt="Home" style="width:250px;"></a>
            <form action="/search" class="m-0 p-5 text-blue-800">
                <input type="search" name="filtro" id="filtro" placeholder="Busca producto, deporte..." class="w-1000 border-2 border-blue-600 px-4 py-2 rounded m-0">
                <input type="image" src="{{asset('lupa.png')}}" alt="Buscar" class="w-10 m-p">
            </form>
            @if (Route::has('login'))
        @auth
            <a href="/profile" class="flex justify-center border-2 border-blue-800 text-blue-800 p-2 rounded">
                <img src="{{asset('user.png')}}" alt="Cuenta" class="w-10">
                <p>CUENTA</p>
            </a>
            <a href="/cart/{{auth()->id()}}" class="flex justify-center border-2 border-blue-800 text-blue-800 p-2 rounded">
                <img src="{{asset('carrito.png')}}" alt="Carrito" class="w-10">
                <p>MI CESTA</p>
            </a>
        @if (auth()->user()->hasRole('admin'))
        <a class="flex justify-center border-2 border-blue-800 text-blue-800 p-2 rounded" href="{{ url('/gestion') }}">
            <img src="{{asset('gestion.png')}}" alt="Gestion" class="w-10">
            <p>GESTION</p>
        </a>
        @endif
        <a class="flex justify-center border-2 border-blue-800 text-blue-800 p-2 rounded" href="{{ url('/logOut') }}">
            <img src="{{asset('logout.png')}}" alt="Cerrar Sesion" class="w-10">
            <p>DESCONECTAR</p> 
        </a>
        @else
        <a href="{{ route('login') }}" class="flex justify-center border-2 border-blue-800 text-blue-800 p-2 rounded">   
            <img src="{{asset('user.png')}}" alt="Cuenta" class="w-10">
            <p>CUENTA</p>
        </a>
        @if (Route::has('register'))
        <a class="flex justify-center border-2 border-blue-800 text-blue-800 p-2 rounded" href="{{ route('register') }}">
            <img src="{{asset('registro.png')}}" alt="Registro" class="w-10">
            <p>REGISTRO</p> 
        </a>
        @endif
        @endauth
        @endif  
        </div>
    </header>
    @yield('content')
    <button id="scrollToTopButton" class="fixed bottom-20 right-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Ir arriba
    </button>
    <footer class="" style="border-top:5px solid rgb(30, 64, 175)">
    <div class="container mx-auto flex flex-col lg:flex-row justify-between px-4">
    <div class="mb-4 lg:mb-0">
      <h2 class="text-xl font-bold">Artículos Deportivos</h2>
      <p>Encuentra los mejores artículos deportivos para tu práctica deportiva favorita.</p>
    </div>
    <div>
      <h3 class="text-lg font-semibold mb-4">Enlaces Rápidos</h3>
      <ul>
        <li><a href="/" class="hover:underline">Inicio</a></li>
        <li><a href="/profile" class="hover:underline">Cuenta</a></li>
        <li><a href="#" class="hover:underline">Contacto</a></li>
      </ul>
    </div>
    <div>
      <h3 class="text-lg font-semibold mb-4">Síguenos</h3>
      <ul>
        <li><a href="#" class="hover:underline">Facebook</a></li>
        <li><a href="#" class="hover:underline">Instagram</a></li>
        <li><a href="#" class="hover:underline">Twitter</a></li>
      </ul>
    </div>
  </div>
    </footer>
</body>
<script>
  document.getElementById('scrollToTopButton').addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
</script>
</html>