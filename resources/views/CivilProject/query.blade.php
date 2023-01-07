@extends('Layouts.main')
@section('title')
@section('subtitulo', 'Consulta de Registros')

@section('content')

<link rel="stylesheet" href="{{ asset('css/query.css') }}">
<div id="search-container">
    <form action="/query" method="GET">
    <div class='box-div'>
            <div class='box-search'>
                <form action="/query" method="get"><input type='search' class='form-control text-center' placeholder='Pesquise o item que deseja Encontrar' id='pesquisar' name="searchquery"></form>   
                <button class='btn btn-primary'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/></svg>
                </button>
            </div>
    </form>
</div>
</div>

<table class="table table-bordered table-dark">
            <thead class="thead-dark">
              <tr>
              
                <th></th>
                <th scope="col">Nome do item</th>
                <th scope="col">Quantidade Atual</th>
                <th scope="col">Marca</th>
                <th scope="col">Complemento</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach($materials as $material) 
                    <tr>
                    <input type="hidden" class="delete_val_id" value="{{ $material->id }}">
                    <td>
                    </td>
                      <td>{{ $material->nome }}</td>
                      <td>{{ $material->quantidade }}</td>
                      <td>{{ $material->marca }}</td>
                      <td>{{ $material->complemento }}</td>
                      <td><button type="button" class="btn btn-danger deletebtn">Deletar</button></td>
                    <td>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
@endsection

@section('scripts')

  <script>

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