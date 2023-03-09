<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="web icon" type="png" href="{{ asset('img/logo_site_3.png') }}">
        <link rel="stylesheet" href="{{ asset('css/pattern.css') }}">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>@yield('title', 'Melo Leal Empreiteira')</title>
   </head>
  
   <!-- Arrumar layout padrão -->
   
   <body>
    <nav class="sidebar">
   
           <img src="\img\MeloLealLogo.png" width="240px" style="margin-top: -30px; margin-bottom: 20px;">
     
         <ul>
            <li class="active"><a href="{{ route('CivilProject-index') }}">Estoque</a></li>
            <li><a href="{{ route('CivilProject-list') }}">Hora Extra</a></li>
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
                  <a href="{{ route('CivilProject-applicants') }}">Itens Retirados</a>
               </li>
               <li>
                  <a href="{{ route('CivilProject-query') }}">Dados Arquivados</a>
               </li>
               </ul>
            </li>
         </ul>
         <footer class="footer navbar-fixed-bottom"><a href="https://github.com/felipeflorianof" target="_blank">&copy; Developed by felipeflorianof</a></footer>
      </nav>
    @yield('content')

   @include('sweetalert::alert')
    @yield('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
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

