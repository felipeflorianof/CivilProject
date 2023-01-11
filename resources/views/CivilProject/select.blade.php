@extends('Layouts.main')
@section('title')

@section('content')
<link rel="stylesheet" href="{{ asset('css/select.css') }}">

<h4 class="card-title text-center layoutText">Lista da saida de itens do Estoque:</h4>
<div class="layout">

  <table id="myTable" class="table table-bordered table-sm table-dark">
            <thead >
              <tr>
                <th class="text-center" scope="col">Item</th>
                <th class="text-center" scope="col">Estoque Atual</th>
                <th class="text-center" scope="col">Marca</th>
                <th class="text-center" scope="col">Complemento</th>
                <th class="text-center" scope="col">Entrada</th>
                <th class="text-center" scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach($materials as $material)
                  @if($material->quantidade >= 1)
                    <tr>
                      <td>{{ $material->nome }}</td>
                      <td>{{ $material->quantidade }}</td>
                      <td>{{ $material->marca }}</td>
                      <td>{{ $material->complemento }}</td>
                      <td>{{ date('d/m/Y', strtotime($material->created_at)) }}</td>
                      <td><a href="{{ route('CivilProject-send', ['id' => $material->id]) }}" class="btn btn-success">Encaminhar</a></td>
                    </tr>
                  @endif
                @endforeach
            </tbody>
  </table>
</div>
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