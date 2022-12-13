@extends('layouts.app')

@section('title', 'CRUD')

@section('content')

<div class="container mt-5">
<div class="row">
  <div class="col-sm-11">
  <h1>Crie um Novo Jogo</h1>
  </div>
  <div class="col-sm-1">
    <a href="{{ route('jogos-index') }}" class="btn btn-success">Voltar</a>
  </div>
</div>

    
    <hr>
    <form action="{{ route('materiais-store') }}" method="POST">
        @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do Jogo">
                </div>
                <div class="form-group">
                    <label for="categoria">Quantidade</label>
                    <input type="text" class="form-control" name="quantidade" placeholder="Categoria do Jogo">
                </div>
                <div class="form-group">
                    <label for="lancamento">Marca</label>
                    <input type="number" class="form-control" name="marca" placeholder="Data de Lançamento">
                </div>
                <div class="form-group">
                    <label for="valor">Complemento</label>
                    <input type="Number" class="form-control" name="complemento" placeholder="Preço do Jogo">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </div>
    </form>
</div>


@endsection