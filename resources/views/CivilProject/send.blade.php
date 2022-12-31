@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Saida de itens')

@section('content')

<link rel="stylesheet" href="{{ asset('css/send.css') }}">
    <div class="form">
        <form action="{{ route('CivilProject-sendstore') }}" method="POST">
            @csrf
                <div class="form-group">
                    <h3><b>Sobre o Item:</b></h3>
                    <div class="form-group">
                        <label for="nome"><b>Nome do Item</b></label>
                        <input type="text" readonly class="form-control" name="nome" value="{{ $materials->nome }}" placeholder="Atualize o nome do Jogo">
                    </div>
                    <div class="form-group">
                        <label for="marca"><b>Marca</b></label>
                        <input type="text" readonly class="form-control" name="marca" value="{{ $materials->marca }}" placeholder="Atualize a Marca">
                    </div>
                    <div class="form-group">
                        <label for="complemento"><b>Complemento</b></label>
                        <input type="text" readonly class="form-control" name="complemento" value="{{ $materials->complemento }}" placeholder="Atualize o Complemento">
                    </div>
                    <br>
                    <h3><b>Sobre o Retirante:</b></h3>
                    <div class="form-group">
                        <label for="complemento"><b>Nome do Solicitante</b></label>
                        <input type="text" class="form-control" name="funcionario"  placeholder="Nome do Solicitante" required>
                    </div>
                    <div class="form-group">
                        <label for="quantidade"><b>Quantidade Solicitada</b></label>
                        <input type="number" class="form-control" name="quantidade_solicitada" placeholder="Quantidade Solicitada" required>
                    </div>
                    <div class="form-group">
                        <label for="quantidade"><b>Observações</b></label>
                        <input type="text" class="form-control" name="observacoes" placeholder="Observações ou Complemento" required>
                    </div>
                    <Input  type="hidden"  name="id" value="{{$materials->id}}" >
                    <div class="form-group">
                        <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
                    </div>
                </div>
        </form>
    </div>

@endsection
<!--https://stackoverflow.com/questions/55023271/how-to-use-triggers-in-laravel-->