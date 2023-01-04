@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Estoque')

@section('content')

    



<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div id="search-container">
    <form action="/" method="GET">
    <div class='box-div'>
            <div class='box-search'>
                <form action="/" method="get"><input type='search' class='form-control text-center' placeholder='Pesquise o item que deseja Encontrar' id='pesquisar' name="search"></form>   
                <button class='btn btn-primary'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/></svg>
                </button>
            </div>
    </form>
</div>
</div>

@foreach($materials as $material)
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="/img/pexels-jeshootscom-834892.jpg" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title"><b>{{ $material->nome }}</b></h3>
    <p><b>Marca: </b>{{ $material->marca }}</p>
    <p><b>Quantidade: </b>{{ $material->quantidade }}</p>
    <p><b>Data de Entrada:</b> {{ date('d/m/Y', strtotime($material->created_at)) }}</p>
    <p class="card-text">Para Saber mais detalhes deste item <a href="{{ route('CivilProject-info', ['id' => $material->id]) }}" class="link-primary">Clique aqui</a></p>
    <div class="acoes">
              <a href="{{ route('CivilProject-edit', ['id' => $material->id]) }}">
              <button class="btn btn-primary">Editar</button>
              </a>


              <button id="open-modal" class="btn btn-danger">Excluir</button>
            <div id="fade" class="hide"></div>
                <div id="modal" class="hide">
                    <div class="modal-header">
                      <h5>Realmente deseja excluir esse registro?</h5>
                    </div>
                    <div class="modal-body">
                      <p class="text-center">Excluindo este registro, ele ainda ficará disponível.<br><b>( Não será excluido completamente! )</b><br> e você poderá encontrá-lo na aba 'Consultas'.</p>
                      <div class="optionsModal">
                        <form action="{{ route('CivilProject-destroy', ['id' => $material->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          <button class="btn btn-success">Confirmar</button>
                        </form>

                          <button id="close-modal" class="btn btn-danger">Cancelar</button>
                      </div>
                    
                  </div>
              </div>
            </div>
  </div>
</div>
@endforeach
<script src="{{ asset('JS/index.js') }}"></script>
@endsection