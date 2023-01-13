<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="web icon" type="png" href="{{ asset('img/logo_site_3.png') }}">
        <link rel="stylesheet" href="{{ asset('css/pattern.css') }}">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <title>@yield('title', 'Melo Leal Empreiteira')</title>
   </head>
  
   
   <body>
    <nav class="sidebar">
   
           <img src="\img\logo_site_full.png" width="240px" style="margin-top: -30px; margin-bottom: 20px;">
     
         <ul>
            <li class="active"><a href="{{ route('CivilProject-index') }}">Estoque</a></li>
            <li><a href="{{ route('CivilProject-extra') }}">Hora Extra</a></li>
            <li>
               <a href="#" class="feat-btn">Gerenciar Estoque
               <span class="fas fa-caret-down first"></span>
               </a>
               <ul class="feat-show">
                  <li><a href="{{ route('CivilProject-create') }}">Entrada</a></li>
                  <li><a href="{{ route('CivilProject-select') }}">Saida</a></li>
               </ul>
            </li>
            <li>
               <a href="#" class="serv-btn">Registros
               <span class="fas fa-caret-down second"></span>
               </a>
               <ul class="serv-show">
               <li>
                  <a href="{{ route('CivilProject-extradata') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                     <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                     </svg>&nbsp;&nbsp;Hora Extra
                  </a>
               </li>
               <li>
                  <a href="{{ route('CivilProject-applicants') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                     <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                     </svg>&nbsp;&nbsp;Itens Retirados
                  </a>
               </li>
               <li>
                  <a href="{{ route('CivilProject-query') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                     <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                     </svg>&nbsp;&nbsp;Dados Arquivados
                  </a>
               </li>
               </ul>
            </li>
         </ul>
         <footer class="footer navbar-fixed-bottom"><a href="https://github.com/felipeflorianof" target="_blank">&copy; Developed by felipeflorianof</a></footer>
      </nav>
    @yield('content')



  







   
   @include('sweetalert::alert')
    @yield('scripts')
      <script>
            $('.feat-btn').click(function(){
               $('nav ul .feat-show').toggleClass("show");
               $('nav ul .first').toggleClass("rotate");
            });
            $('.serv-btn').click(function(){
               $('nav ul .serv-show').toggleClass("show1");
               $('nav ul .second').toggleClass("rotate");
            });
            $('nav ul li').click(function(){
               $(this).addClass("active").siblings().removeClass("active");
            });
      </script>
   </body>
</html>

