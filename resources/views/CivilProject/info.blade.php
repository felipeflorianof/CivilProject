@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Informações do item')

@section('content')

<div class="bigcard">
<div class="card mb-3">
  <img class="card-img-top" src="/img/2022-12-29.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><b>Item:</b> {{ $materials->nome }}</h5>
    <p class="card-text"><b>Complemento:</b> {{ $materials->complemento }}</p>
    <p class="card-text"><b>Marca:</b> {{ $materials->marca }}</p>
    <p class="card-text"><b>Quantidade Inicial do Lote:</b> {{ $materials->quantidadeoriginal }}</p>
    <p class="card-text"><small class="text-muted">Data de Entrada {{ date('d/m/y', strtotime($materials->created_at)) }}</small></p>
  </div>
</div>
</div>

@endsection