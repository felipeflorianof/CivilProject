@extends('layouts.app')

@section('title')
@section('content')
@section('subtitle', 'Estoque')
@foreach($materials as $material)
          <div class="content">
            <h1><b>{{ $material->nome }}</b></h1>
            <p><b>Marca: </b>{{ $material->marca }}</p>
            <p><b>Quantidade: </b>{{ $material->quantidade }}</p>
            <p><b>Data:</b>{{ date('d/m/y', strtotime($material->created_at)) }}</p>

            <div class="acoes">
              <a href="#">
                <button class="btn btn-success">Detalhes</button>
              </a>
              
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

@endforeach


@endsection