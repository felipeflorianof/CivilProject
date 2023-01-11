@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Saida de itens')

@section('content')

<link rel="stylesheet" href="{{ asset('css/send.css') }}">
<h4 class="text-center">Informe os Dados do Pedido</h4>
    <div class="form">
        <form action="{{ route('CivilProject-sendstore') }}" method="POST">
            @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="nome"><b>Nome do Item:</b></label>
                        <input type="text" readonly class="form-control" name="nome" value="{{ $materials->nome }}">
                    </div>
                    <div class="form-group">
                        <label for="marca"><b>Marca:</b></label>
                        <input type="text" readonly class="form-control" name="marca" value="{{ $materials->marca }}">
                    </div>
                    <div class="form-group">
                        <label for="complemento"><b>Quantidade disponível:</b></label>
                        <input type="text" readonly class="form-control" name="complemento" value="{{ $materials->quantidade }}">
                    </div>
                    <div class="form-group">
                        <label for="funcionario"><b>Nome do Funcionário:</b></label>
                        <input type="text" class="form-control" name="funcionario"  placeholder="Nome do Funcionário Solicitante" required>
                    </div>
                    <div class="form-group">
                        <label for="quantidade_solicitade"><b>Quantidade Solicitada:</b></label>
                        <input type="number" class="form-control" name="quantidade_solicitada" placeholder="Quantidade Solicitada" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="observacoes"><b>Observações:</b></label>
                        <input type="text" class="form-control" name="observacoes" placeholder="Observações ou Complemento">
                    </div>
                    <Input  type="hidden"  name="id" value="{{$materials->id}}" >
                    <div class="form-group">
                        <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
                    </div>
                </div>
        </form>
    </div>

@endsection