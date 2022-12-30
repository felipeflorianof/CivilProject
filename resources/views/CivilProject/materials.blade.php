@extends('Layouts.app')

@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@if(type == 1)
@foreach($materials as $material)
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="/img/pexels-jeshootscom-834892.jpg" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title"><b>{{ $material->nome }}</b></h3>
    <p><b>Marca: </b>{{ $material->marca }}</p>
    <p><b>Quantidade: </b>{{ $material->quantidade }}</p>
    <p><b>Data:</b> {{ date('d/m/y', strtotime($material->created_at)) }}</p>
    <p class="card-text">Para Saber mais detalhes deste item <a href="#" class="link-primary">Clique aqui</a></p>
    <div class="acoes">
              <a href="{{ route('CivilProject-edit', ['id' => $material->id]) }}">
              <button class="btn btn-primary">Editar</button>
              </a>

              <form action="{{ route('CivilProject-destroy', ['id' => $material->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Remover</button>
              </form>
            </div>
  </div>
</div>
@endforeach
@endif
@endsection