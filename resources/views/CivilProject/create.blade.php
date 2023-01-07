@extends('Layouts.main')
@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/create.css') }}">

<h4 class="card-title text-center">Insira as Informações do item que entrará no Estoque:</h4>
<div class="form">
        <form action="{{ route('CivilProject-store') }}" method="POST">
            @csrf
                    <div class="form-group">
                        <label for="nome"><b>Nome</b></label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome do Material / Ferramenta" required>
                    </div>
                    <div class="form-group">
                        <label for="quantidade"><b>Quantidade</b></label>
                        <input type="number" class="form-control" name="quantidade" placeholder="Quantidade do Material / Ferramenta" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="marca"><b>Marca</b></label>
                        <input type="text" class="form-control" name="marca" placeholder="Marca do Material / Ferramenta" required>
                    </div>
                    <div class="form-group">
                        <label for="complemento"><b>Complemento</b></label>
                        <input type="text" class="form-control" name="complemento" placeholder="Complemento Ou Observações">
                    </div>
                    <div class="form-group">
                        <label for="title"><b>O item é Ferramenta ou Material?</b></label>
                            <select name="type" id="type" class="form-control">
                                <option value="0" required>Ferramenta</option>
                                <option value="1" required>Material</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
        </form>
    </div>
@endsection