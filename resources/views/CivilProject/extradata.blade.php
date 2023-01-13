@extends('Layouts.main')
@section('title')

@section('content')
<link rel="stylesheet" href="{{ asset('css/extra.css') }}">

<h4 class="card-title text-center">Registros de Hora Extra</h4>
  <table id="myTable" class="table table-bordered table-sm table-dark">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Funcionario</th>
              <th scope="col">Entrada</th>
              <th scope="col">Saida</th>
              <th scope="col">Data</th>
            </tr>
          </thead>
          <tbody>
              @foreach($extra as $extra)
                  <tr>
                    <td>{{ $extra->funcionario }}</td>
                    <td>{{ $extra->entrada }}</td>
                    <td>{{ $extra->saida }}</td>
                    <td>{{ date('d/m/Y', strtotime($extra->created_at)) }}</td>
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
          responsive: true,
          lengthMenu: [ 5, 10, 15, 20, 30, 50, 100 ]
        })
      });
    </script>
@endsection