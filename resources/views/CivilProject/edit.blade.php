@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Edite o item')

@section('content')

<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<div class="form">
    <form action="{{ route('CivilProject-update', ['id' => $materials->id]) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
                <div class="form-group">
                    <label for="nome"><b>Nome</b></label>
                    <input type="text" class="form-control" name="nome" value="{{ $materials->nome }}" placeholder="Atualize o nome do Jogo">
                </div>
                <div class="form-group">
                    <label for="marca"><b>Marca</b></label>
                    <input type="text" class="form-control" name="marca" value="{{ $materials->marca }}" placeholder="Atualize a Marca">
                </div>
                <div class="form-group">
                    <label for="quantidade"><b>Quantidade</b></label>
                    <input type="number" class="form-control" name="quantidade" value="{{ $materials->quantidade }}" placeholder="Atualize a Quantidade">
                </div>
                <div class="form-group">
                    <label for="complemento"><b>Complemento</b></label>
                    <input type="text" class="form-control" name="complemento" value="{{ $materials->complemento }}" placeholder="Atualize o Complemento">
                </div>
                <div class="form-group">
                        <label for="title"><b>O item é Ferramenta ou Material?</b></label>
                            <select name="type" id="type" class="form-control">
                                <option value="0" required>Ferramenta</option>
                                <option value="1" required>Material</option>
                            </select>
                    </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Atualizar" class="btn btn-primary">
                </div>
            </div>
    </form>
</div>

@endsection