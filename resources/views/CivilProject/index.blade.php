@extends('layout.app')

@section('title', 'CRUD')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<h3>Controle Almoxarife</h3>
<p><a href="">App</a></p>
<p><a href="">Entrada</a></p>
<p><a href="">Saida</a></p>

<!--
<h1 class="text-center">Ferramentas</h1>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Marca</th>
      <th scope="col">Complemento</th>
      <th>Editar</th>
      <th>Deletar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($materials as $material)
    <tr>
      <td>{{ $material->nome }}</td>
      <td>{{ $material->quantidade }}</td>
      <td>{{ $material->marca }}</td>
      <td>{{ $material->complemento }}</td>
      <td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
-->
@endsection