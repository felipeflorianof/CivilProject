@extends('Layouts.main')
@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/send.css') }}">
<h4 class="text-center">Informe</h4>
    <div class="form">
        <form action="{{ route('CivilProject-updateRequest', ['id' => $applicants->id]) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <div class="form-group">
                        <label for="marca"><b>item:</b></label>
                        <input type="text" readonly class="form-control" name="nome" value="{{ $applicants->nome }}">
                    </div>
                    <div class="form-group">
                        <label for="quantidade_solicitada"><b>Quantidade retirada:</b></label>
                        <input type="text" readonly class="form-control" name="quantidade_solicitada" value="{{ $applicants->quantidade }}">
                    </div>
                    <div class="form-group">
                        <label for="funcionario"><b>Nome do funcionário:</b></label>
                        <input type="text" readonly class="form-control" name="funcionario" value="{{ $applicants->funcionario }}">
                    </div>
                    <div class="form-group">
                        <label for="marca"><b>Marca:</b></label>
                        <input type="text" readonly class="form-control" name="marca" value="{{ $applicants->marca }}">
                    </div>
                    <div class="form-group">
                        <label for="data_devolucao"><b>Data da Devolução:</b></label>
                        <input type="date" name="data_devolucao" id="data_devolucao" class="form-control w-25" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="devolvido"><b>Quantidade á Devolver:</b></label>
                        <input type="number" class="form-control" name="devolvido" placeholder="Quantidade que está devolvendo" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="mais_observacoes"><b>Observações:</b></label>
                        <input type="text" class="form-control" name="mais_observacoes" placeholder="Observações ou Complemento">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
                    </div>
                </div>
        </form>
    </div>

@endsection
@endsection