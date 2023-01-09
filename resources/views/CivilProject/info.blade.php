@extends('Layouts.main')
@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/info.css') }}">

<h4 class="text-center">Informações do item: {{ $materials->nome }}</h4>
<div class="form">
<img class="card-img-top" src="/img/pexels-tiger-lily-4481531.jpg" alt="Card image cap">
<div class="card-body">
  <h5 class="card-title"><b>Item:</b> {{ $materials->nome }}</h5>
  <p class="card-text"><b>Marca:</b> {{ $materials->marca }}</p>
  <p class="card-text"><b>Quantidade Inicial do Lote:</b> {{ $materials->quantidadeoriginal }}</p>
  <p class="card-text"><b>Quantidade Atual no Estoque:</b> {{ $materials->quantidade }}</p>
  <p class="card-text"><b>Complemento:</b> {{ $materials->complemento }}</p>
  <p class="card-text"><small class="text-muted">Data de Entrada do item: {{ date('d/m/Y', strtotime($materials->created_at)) }}</small></p>
</div>
</div>
  
@endsection