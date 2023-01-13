@extends('Layouts.main')
@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/applicants.css') }}">
<h4 class="card-title text-center">Lista de itens retirados do Estoque</h4>

  <table id="myTable" class="table table-bordered table-sm table-dark text-center display nowrap" style="width:100%">
    <thead class="thead-dark">
      <tr>     
        <th class="text-center" scope="col">Funcionário</th>
        <th class="text-center" scope="col">item</th>
        <th class="text-center" scope="col">Marca</th>
        <th class="text-center" scope="col">Pegou</th>
        <th class="text-center" scope="col">Devolveu</th>
        <th class="text-center" scope="col">Retirada</th>
        <th class="text-center" scope="col">Devolução</th>
        <th class="text-center" scope="col">Observações</th>
        <th class="text-center" scope="col">Devolver</th>
      </tr>
    </thead>
    <tbody>
    @foreach($applicants as $applicant)
      <tr>
        <td>{{ $applicant->funcionario }}</td>
        <td>{{ $applicant->nome }}</td>
        <td>{{ $applicant->marca }}</td>
        <td>{{ $applicant->quantidade }}</td>
        <td>{{ $applicant->devolvido }}</td> 
        <td>{{ date('d/m/Y', strtotime($applicant->created_at)) }}</td>
        <td>{{ date('d/m/Y', strtotime($applicant->data_devolucao)) }}</td>
        <td>{{ $applicant->mais_observacoes }}</td>
        <td><a href="{{ route('CivilProject-return', ['id' => $applicant->id]) }}" class="test btn btn-success">Devolver</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
        $('#myTable').DataTable({
          language: {
            url: "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json",
          },
          lengthMenu: [ 5, 10, 15, 20, 30, 50, 100 ]
        })
  });
  </script>
@endsection