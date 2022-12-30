@extends('Layouts.app')

@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Solicitantes</th>
      <th scope="col">item</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Marca</th>
      <th scope="col">Observações</th>
      <th scope="col">Data</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($applicants as $applicant)
    <tr>
      <td>{{ $applicant->funcionario }}</td>
      <td>{{ $applicant->nome }}</td>
      <td>{{ $applicant->quantidade }}</td>
      <td>{{ $applicant->marca }}</td>
      <td>{{ $applicant->observacoes }}</td>
      <td>{{ date('d/m/y', strtotime($applicant->created_at)) }}</td>
      <td><a href="#" class="btn btn-primary">Editar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection