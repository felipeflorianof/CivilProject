@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Informações do item ')

@section('content')

  <div class="pai">

  
  <img class="card-img-top w-50" src="/img/pexels-tiger-lily-4481531.jpg" alt="Card image cap">
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