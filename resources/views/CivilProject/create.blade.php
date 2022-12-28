@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
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
        <a href="/" class="opcoes" id="open-modal" onclick="warnning()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
        </svg>&nbsp;&nbsp;Saida
        </a>
    <a class="opcoes" href="#">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
      <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
      </svg>&nbsp;&nbsp;Ferramentas
    </a>
    <a class="opcoes" href="#">
      <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-paint-bucket" viewBox="0 0 16 16"><path d="M6.192 2.78c-.458-.677-.927-1.248-1.35-1.643a2.972 2.972 0 0 0-.71-.515c-.217-.104-.56-.205-.882-.02-.367.213-.427.63-.43.896-.003.304.064.664.173 1.044.196.687.556 1.528 1.035 2.402L.752 8.22c-.277.277-.269.656-.218.918.055.283.187.593.36.903.348.627.92 1.361 1.626 2.068.707.707 1.441 1.278 2.068 1.626.31.173.62.305.903.36.262.05.64.059.918-.218l5.615-5.615c.118.257.092.512.05.939-.03.292-.068.665-.073 1.176v.123h.003a1 1 0 0 0 1.993 0H14v-.057a1.01 1.01 0 0 0-.004-.117c-.055-1.25-.7-2.738-1.86-3.494a4.322 4.322 0 0 0-.211-.434c-.349-.626-.92-1.36-1.627-2.067-.707-.707-1.441-1.279-2.068-1.627-.31-.172-.62-.304-.903-.36-.262-.05-.64-.058-.918.219l-.217.216zM4.16 1.867c.381.356.844.922 1.311 1.632l-.704.705c-.382-.727-.66-1.402-.813-1.938a3.283 3.283 0 0 1-.131-.673c.091.061.204.15.337.274zm.394 3.965c.54.852 1.107 1.567 1.607 2.033a.5.5 0 1 0 .682-.732c-.453-.422-1.017-1.136-1.564-2.027l1.088-1.088c.054.12.115.243.183.365.349.627.92 1.361 1.627 2.068.706.707 1.44 1.278 2.068 1.626.122.068.244.13.365.183l-4.861 4.862a.571.571 0 0 1-.068-.01c-.137-.027-.342-.104-.608-.252-.524-.292-1.186-.8-1.846-1.46-.66-.66-1.168-1.32-1.46-1.846-.147-.265-.225-.47-.251-.607a.573.573 0 0 1-.01-.068l3.048-3.047zm2.87-1.935a2.44 2.44 0 0 1-.241-.561c.135.033.324.11.562.241.524.292 1.186.8 1.846 1.46.45.45.83.901 1.118 1.31a3.497 3.497 0 0 0-1.066.091 11.27 11.27 0 0 1-.76-.694c-.66-.66-1.167-1.322-1.458-1.847z"/></svg>&nbsp;&nbsp;Materias
    </a>
    <a class="opcoes" href="#">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
    </svg>&nbsp;&nbsp;Hora Extra
    </a>
</section>
</section>
<!--Fim do Layout Fixo-->

<!--Layout Dinâmico-->
<section class="container2">
<h3 class="Subtitulo">Entrada de itens</h3>
<hr class="hr-3">

    <div class="form">
        <form action="{{ route('CivilProject-store') }}" method="POST">
            @csrf
                    <div class="form-group">
                        <label for="nome"><b>Nome</b></label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome do Material / Ferramenta">
                    </div>
                    <div class="form-group">
                        <label for="quantidade"><b>Quantidade</b></label>
                        <input type="text" class="form-control" name="quantidade" placeholder="Quantidade do Material / Ferramenta">
                    </div>
                    <div class="form-group">
                        <label for="marca"><b>Marca</b></label>
                        <input type="text" class="form-control" name="marca" placeholder="Marca do Material / Ferramenta">
                    </div>
                    <div class="form-group">
                        <label for="complemento"><b>Complemento</b></label>
                        <input type="text" class="form-control" name="complemento" placeholder="Complemento Ou Observações">
                    </div>
                    <div class="form-group">
                        <label for="title"><b>O item é Ferramenta ou Material?</b></label>
                            <select name="type" id="type" class="form-control">
                                <option value="0" required>Ferramenta</option>
                                <option value="1" required>Material</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
        </form>
    </div>


</section>
</section>
<!--Fim do Layout Dinâmico-->
<script src="{{ asset('JS/create.js') }}"></script>
@endsection

