@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Saida de itens')

@section('content')

<h4 class="card-title text-center layoutText">Lista da saida de itens do Estoque:</h4>
<div class="layout">


<div id="search-container">
    <form action="/select" method="GET">
    <div class='box-div'>
            <div class='box-search'>
                <form action="/select" method="get"><input type='search' class='form-control text-center' placeholder='Pesquise o item que deseja Encontrar' id='pesquisar' name="searchselect"></form>   
                <button class='btn btn-primary'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/></svg>
                </button>
            </div>
    </form>
</div>

<table class="table table-bordered table-sm table-dark">
            <thead class="thead-dark">
              <tr>
                <th></th>
                <th scope="col">Nome do item</th>
                <th scope="col">Quantidade Atual</th>
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
                      <td>{{ $material->marca }}</td>
                      <td>{{ $material->complemento }}</td>
                      <td>{{ date('d/m/Y', strtotime($material->created_at)) }}</td>
                      <td><a href="{{ route('CivilProject-send', ['id' => $material->id]) }}" class="btn btn-success">Encaminhar</a></td>
                    <td>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
</div>
@endsection