@extends('Layouts.main')
@section('title')
@section('subtitulo')

@section('content')

<link rel="stylesheet" href="{{ asset('css/edit.css') }}">

<h4 class="card-title text-center">Edite as Informações do item: {{ $materials->nome }}</h4>
<div class="form">
    <form action="{{ route('CivilProject-update', ['id' => $materials->id]) }}" method="POST" style="position: relative;">
        @csrf
        @method('PUT')
            <div class="form-group">
                <div class="form-group">
                    <label for="nome"><b>Nome</b></label>
                    <input type="text" class="form-control w-50" name="nome" value="{{ $materials->nome }}" placeholder="Atualize o nome do Jogo">
                </div>
                <div class="form-group">
                    <label for="marca"><b>Marca</b></label>
                    <input type="text" class="form-control w-50" name="marca" value="{{ $materials->marca }}" placeholder="Atualize a Marca">
                </div>
                <div class="form-group">
                    <label for="quantidade"><b>Quantidade</b></label>
                    <input type="number" class="form-control w-50" name="quantidade" value="{{ $materials->quantidade }}" placeholder="Atualize a Quantidade">
                </div>
                <div class="form-group">
                    <label for="complemento"><b>Complemento</b></label>
                    <input type="text" class="form-control w-50" name="complemento" value="{{ $materials->complemento }}" placeholder="Atualize o Complemento">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Editar" class="btn btn-primary">
                </div>
            </div>

            <img src="/img/editar.png" style="width: 180px; position: absolute; top: 100px; right: 80px;">
    </form>
</div>

@endsection