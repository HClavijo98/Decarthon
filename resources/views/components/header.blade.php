<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title')</title>
      <link rel="icon" type="image/x-icon" href="favicon.ico">
      <link href="dist/hamburgers.css" rel="stylesheet">
      <script src="https://cdn.tailwindcss.com"></script>
      <style>
         /* BARRA DE SCROLL */
         body {
         background-image: url('/storage/background.jpg');
         }
         ::-webkit-scrollbar {
         width: 5px;
         }
         ::-webkit-scrollbar-track {
         background: transparent;
         border-radius: 5px;
         }
         ::-webkit-scrollbar-thumb {
         background: #000;
         border-radius: 5px;
         }
         ::-webkit-scrollbar-thumb:hover {
         background: #000;
         }
         .card {
         opacity: 0;
         transform: translateY(20px);
         transition: opacity 0.5s ease-out, transform 0.5s ease-out;
         }
         .card.fadeIn {
         opacity: 1;
         transform: translateY(0);
         }
         #menu {
         z-index: 2;
         }
         #menu-bar {
         width: 45px;
         height: 45px;
         margin: 30px 0 20px 20px;
         cursor: pointer;
         }
         .bar {
         height: 5px;
         width: 100%;
         background-color: #ffffff;
         display: block;
         border-radius: 5px;
         transition: 0.3s ease;
         }
         #bar1 {
         transform: translateY(-4px);
         }
         #bar3 {
         transform: translateY(4px);
         }
         .nav {
         transition: 0.3s ease;
         display: none;
         }
         .nav ul {
         padding: 0 22px;
         }
         .nav li {
         list-style: none;
         padding: 12px 0;
         }
         .nav li a {
         color: white;
         font-size: 20px;
         text-decoration: none;
         }
         .nav li a:hover {
         font-weight: bold;
         }
         .menu-bg, #menu {
         top: 0;
         left: 0;
         position: absolute;
         }
         .menu-bg {
         z-index: 1;
         width: 0;
         height: 0;
         margin: 30px 0 20px 20px;
         background: radial-gradient(circle, #1f2937, #1f2937);
         border-radius: 50%;
         transition: 0.3s ease;
         }
         .change {
         display: block;
         }
         .change .bar {
         background-color: white;
         }
         .change #bar1 {
         transform: translateY(4px) rotateZ(-45deg);
         }
         .change #bar2 {
         opacity: 0;
         }
         .change #bar3 {
         transform: translateY(-6px) rotateZ(45deg);
         }
         .change-bg {
         width: 520px;
         height: 460px;
         transform: translate(-60%,-30%);
         }
      </style>
   </head>
   <header class="bg-gray-800 p-8 flex justify-between items-center fixed w-full z-10 text-white">
    <div class="flex items-center z-10"> 
       <div id="menu">
          <div id="menu-bar" onclick="menuOnClick()">
             <div id="bar1" class="bar"></div>
             <div id="bar2" class="bar"></div>
             <div id="bar3" class="bar"></div>
          </div>
          <nav class="nav" id="nav">
             <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="#">Perfil</a></li>
                <li><a href="/filtrar">Filtrar</a></li>
             </ul>
          </nav>
       </div>
       <div class="menu-bg" id="menu-bg"></div>
       {{-- <div class="fixed right-0 top-5"> 
          <img src="logotipo.png" alt="Logo" class="h-12 mr-2">
       </div> --}}
    </div>
    <div>
            <h1 class="text-2xl font-bold">Biblioteca Eudald</h1>
            <p class="text-sm">Abierto cuando me salga de los huevos</p>
        </div>
 </header>
   <script>
      function menuOnClick() {
      document.getElementById("menu-bar").classList.toggle("change");
      document.getElementById("nav").classList.toggle("change");
      document.getElementById("menu-bg").classList.toggle("change-bg");
      }
   </script>
   <body>

   </body>
   <footer class="bg-gray-800 text-white p-8">
      <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0">
          <p>&copy; Biblioteca Eudald</p>
          <p class="mt-2">Todos los derechos reservados.</p>
        </div>
        <div class="flex space-y-2 md:space-y-0 md:space-x-4">
          <a href="#" class="hover:text-gray-300">Inicio</a>
          <a href="#" class="hover:text-gray-300">Acerca de nosotros</a>
          <a href="#" class="hover:text-gray-300">Contacto</a>
          <a href="#" class="hover:text-gray-300">Política de privacidad</a>
          <a href="#" class="hover:text-gray-300">Términos y condiciones</a>
        </div>
      </div>
    </footer>
</html>