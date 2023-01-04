@extends('Layouts.main')

@section('title')
@section('subtitulo', 'Solicitações dos Funcionários')
@section('content')

<link rel="stylesheet" href="{{ asset('css/applicants.css') }}">

<h4 class="card-title text-center">Lista de itens retirados do Estoque</h4>

<div id="search-container">
    <form action="/applicants" method="GET">
    <div class='box-div'>
            <div class='box-search'>
                <form action="/applicants" method="get"><input type='search' class='form-control text-center' placeholder='Pesquise pela Data / Nome do Funcionário ou item' id='pesquisar' name="searchapplicants"></form>   
                <button class='btn btn-primary'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/></svg>
                </button>
            </div>
    </form>
</div>

<table class="table table-striped table-bordered mw-80">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Solicitantes</th>
      <th scope="col">item</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Marca</th>
      <th scope="col">Observações</th>
      <th scope="col">Data da retirada</th>
      <th scope="col">Total Devolvido</th>
      <th scope="col">Data da devolução</th>
      <th scope="col">Editar</th>
      <th scope="col">Devolver</th>
    
    </tr>
  </thead>
  <tbody>
  
  @foreach($applicants as $applicant)
    <tr>
   
      <td>{{ $applicant->funcionario }}</td>
      <td>{{ $applicant->nome }}</td>
      <td>{{ $applicant->quantidade }}</td>
      <td>{{ $applicant->marca }}</td>
      <td>{{ $applicant->observacoes }}</td>
      <td>{{ date('d/m/y', strtotime($applicant->created_at)) }}</td>
      <td>0</td>
      <td>-</td>
      <td><a href="#" class="btn btn-primary">Editar</a></td>
      <td><a href="#" class="btn btn-success">Devolver</a></td>
   
    </tr>
  @endforeach
  </tbody>
</table>

@endsection