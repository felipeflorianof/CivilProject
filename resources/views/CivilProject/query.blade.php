@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Consulta de Registros')

@section('content')

<link rel="stylesheet" href="{{ asset('css/query.css') }}">
<div id="search-container">
    <form action="/query" method="GET">
    <div class='box-div'>
            <div class='box-search'>
                <form action="/query" method="get"><input type='search' class='form-control text-center' placeholder='Pesquise o item que deseja Encontrar' id='pesquisar' name="searchquery"></form>   
                <button class='btn btn-primary'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/></svg>
                </button>
            </div>
    </form>
</div>
</div>

<table class="table table-bordered table-dark">
            <thead class="thead-dark">
              <tr>
                <th></th>
                <th scope="col">Nome do item</th>
                <th scope="col">Quantidade Atual</th>
                <th scope="col">Quantidade de Entrada</th>
                <th scope="col">Marca</th>
                <th scope="col">Complemento</th>
                <th scope="col">Data de Entrada</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach($materials as $material)
                    <tr>
                    <td>
                    </td>
                      <td>{{ $material->nome }}</td>
                      <td>{{ $material->quantidade }}</td>
                      <td>{{ $material->quantidadeoriginal }}</td>
                      <td>{{ $material->marca }}</td>
                      <td>{{ $material->complemento }}</td>
                      <td>{{ date('d/m/Y', strtotime($material->created_at)) }}</td>
                      <td class="tdModal">


                        <button id="open-modal" class="btn btn-danger">Excluir</button>
                            <div id="fade" class="hide"></div>
                                <div id="modal" class="hide">
                                    <div class="modal-header">
                                      <h5>Realmente deseja excluir esse registro?</h5>
                                    </div>
                                    <div class="modal-body">
                                      <p class="text-center">Excluindo este registro, ele <b>NÃO</b> ficará mais disponível.<br><b>( SERÁ EXCLUIDO COMPLETAMENTE )</b><br> e você  não terá mais acesso a esses dados.</p>
                                      <div class="optionsModal">
                                        <form action="{{ route('CivilProject-forceRemove', ['id' => $material->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                          <button class="btn btn-success">Confirmar</button>
                                        </form>

                                          <button id="close-modal" class="btn btn-danger">Cancelar</button>
                                      </div>
                                    
                                  </div>
                              </div>


                              
                      </td>
                    <td>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
@endsection