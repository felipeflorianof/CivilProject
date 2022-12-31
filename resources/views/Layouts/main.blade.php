<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/pattern.css') }}">
    <title>@yield('title', 'Melo Leal Empreiteira')</title>
</head>
<body>
<!--Layout Fixo-->
<section class="pai">
<section class="pai-container">
    <section class="container">

    <img width="280" height="90" src="https://meloleal.com.br/wp-content/uploads/2020/07/logo_site_2.png" class="elementor-animation-bob attachment-large size-large" alt="" srcset="https://meloleal.com.br/wp-content/uploads/2020/07/logo_site_2.png 759w, https://meloleal.com.br/wp-content/uploads/2020/07/logo_site_2-300x108.png 300w" sizes="(max-width: 759px) 100vw, 759px">
    <hr class="hr">

    <a class="opcoes" href="{{ route('CivilProject-index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16"><path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/></svg>&nbsp;&nbsp;Estoque
    </a>
    <a class="opcoes" href="{{ route('CivilProject-create') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16"><path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/></svg>&nbsp;&nbsp;Entrada
    </a>
    <a class="opcoes" href="{{ route('CivilProject-select') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
      <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
      </svg>&nbsp;&nbsp;Saida
    </a>  
    <a class="opcoes" href="{{ route('CivilProject-applicants') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
    </svg>&nbsp;&nbsp;Solicitações
    </a>
    <a class="opcoes" href="{{ route('CivilProject-extra') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
    </svg>&nbsp;&nbsp;Hora Extra
    </a>
</section>
</section>
<!--Fim do Layout Fixo-->

<!--Layout Dinâmico-->
<section class="container2">
<h3 class="Subtitulo"><b>@yield('subtitulo', 'Melo Leal')</b></h3>
<hr class="hr-3">
@if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
@endif
<br><br>
@yield('content')











</section>
</section>
<!--Fim do Layout Dinâmico-->


<script src="{{ asset('JS/pattern.js') }}"></script>
</body>
</html>