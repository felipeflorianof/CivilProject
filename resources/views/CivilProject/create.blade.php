@extends('Layouts.main')
@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/create.css') }}">

<h4 class="card-title text-center">Adicione as Informações do item que entrará no Estoque:</h4>
    <div class="form">
        <form action="{{ route('CivilProject-store') }}" method="POST" style="min-width: 800px; position: relative;">
            @csrf
                    <div class="form-group">
                        <label for="nome"><b>Item:</b></label>
                        <input type="text" class="form-control w-50" name="nome" placeholder="Nome do Material / Ferramenta" required>
                    </div>
                    <div class="form-group">
                        <label for="quantidade"><b>Quantidade:</b></label>
                        <input type="number" class="form-control  w-50" name="quantidade" placeholder="Quantidade do Material / Ferramenta" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="marca"><b>Marca:</b></label>
                        <input type="text" class="form-control w-50" name="marca" placeholder="Marca do Material / Ferramenta" required>
                    </div>
                    <div class="form-group">
                        <label for="complemento"><b>Complemento:</b></label>
                        <input type="text" class="form-control w-50" name="complemento" placeholder="Complemento Ou Observações">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>

                    <img src="/img/workers.png" style="width: 180px; position: absolute; top: 100px; right: 80px;">
        </form>
    </div>
@endsection