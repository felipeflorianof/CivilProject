@extends('Layouts.main')
@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/query.css') }}">


<h4 class="text-center">Registros Arquivados</h4>

    <table id="myTable" class="table table-bordered table-sm table-dark">
        <thead class="thead-dark">
                <tr>
                  <th scope="col">Nome do item</th>
                  <th scope="col">Quantidade Atual</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Complemento</th>
                  <th scope="col">Data de Entrada</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($materials as $material) 
                      <tr>
                      <input type="hidden" class="delete_val_id" value="{{ $material->id }}">
                        <td>{{ $material->nome }}</td>
                        <td>{{ $material->quantidade }}</td>
                        <td>{{ $material->marca }}</td>
                        <td>{{ $material->complemento }}</td>
                        <td>{{ date('d/m/Y', strtotime($material->created_at)) }}</td>
                        <td><button type="button" class="btn btn-danger deletebtn">Deletar</button></td>
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

    $(document).ready(function () {

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
      $('.deletebtn').click(function (e) { 

        var delete_id = $(this).closest("tr").find('.delete_val_id').val();
        //alert(delete_id);

          Swal.fire({
            title: 'Você tem certeza?',
            text: "Esse registro será excluido completamente! você não terá mais acesso a esses dados.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Cancelar'

          }).then((result) => {
            if (result.isConfirmed) {
              var data = {
                  "_token": $('input[name="csrf-token"]').val(),
                  "id": delete_id,
              };
              $.ajax({
                type: "DELETE",
                url: '/query/'+delete_id,
                data: "data",
                success: function (response) {
                  Swal.fire(
                    'Deletado!',
                    'Seu Registro foi deletado.',
                    'success',
                  ).then((result) =>{
                    window.location.reload();
                  });
                }
              });  
            }
          })
      });
    });
  </script>
@endsection