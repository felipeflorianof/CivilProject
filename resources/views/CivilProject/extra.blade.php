@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Hora Extra')

@section('content')
<link rel="stylesheet" href="{{ asset('css/extra.css') }}">

<h4 class="card-title text-center">Insira as Informações do Funcionário</h4>

<form action="{{ route('CivilProject-extrastore') }}" method="POST" class="form">
@csrf

    <div>
        <p><b>Funcionário:</b><input type="text" name="funcionario" id="funcionario" class="form-control w-50" required placeholder="Nome do Funcionário"></p>
    </div>

    <div>
        <p><b>Entrada:</b><input type="time" name="entrada" id="entrada" class="form-control w-50" required></p>
    </div>

    <div>
        <p><b>Saida</b><input type="time" name="saida" id="saida" class="form-control w-50" required></p>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Enviar" class="btn btn-success">
    </div>
</form>
@endsection