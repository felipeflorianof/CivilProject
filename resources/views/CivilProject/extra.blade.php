@extends('Layouts.main')
@section('title')

@section('content')
<link rel="stylesheet" href="{{ asset('css/extra.css') }}">

<h4 class="card-title text-center">Insira as Informações do Funcionário</h4>

<form action="{{ route('CivilProject-extrastore') }}" method="POST" class="form">
@csrf
    <div>
        <p><b>Funcionário:</b><input type="text" name="funcionario" id="funcionario" class="form-control w-50" required placeholder="Nome do Funcionário"></p>
    </div>

    <div>
        <p><b>Entrada:</b><input type="time" name="entrada" id="entrada" class="form-control w-25" required></p>
    </div>

    <div>
        <p><b>Saida</b><input type="time" name="saida" id="saida" class="form-control w-25" required></p>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
    </div>

</form>
<br><br>

<h4 class="text-center">Registros de Hora extra</h4>

<div class="form">

  <table class="table table-bordered table-sm table-dark">
          <thead class="thead-dark">
            <tr>
              <th></th>
              <th scope="col">Funcionario</th>
              <th scope="col">Entrada</th>
              <th scope="col">Saida</th>
              <th scope="col">Data</th>
            </tr>
          </thead>
          <tbody>
              @foreach($extra as $extra)
                  <tr>
                  <td>
                  </td>
                    <td>{{ $extra->funcionario }}</td>
                    <td>{{ $extra->entrada }}</td>
                    <td>{{ $extra->saida }}</td>
                    <td>{{ date('d/m/Y', strtotime($extra->created_at)) }}</td>
                  <td>
                  </td>
                  </tr>
              @endforeach
          </tbody>
    </table>
</div>

@endsection