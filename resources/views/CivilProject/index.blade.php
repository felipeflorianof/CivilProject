@extends('Layouts.main')
@section('title')

@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <div id="search-container">
      <form action="/" method="GET">
      <div class='box-div'>
              <div class='box-search'>

                  <form action="/" method="get"><input type='search' class='form-control text-center' placeholder='Pesquise o item que deseja Encontrar' id='pesquisar' name="search"></form>   

                  <button class='btn btn-primary'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                      <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/></svg>
                  </button>
              </div>
              <select class="ml-auto inputStyles form-control orderby">
                      <option value="" disabled="">Ordernar Por</option>
                      <option value="min-date" class="bg-slate-100 dark:bg-slate-800">Adicionado Primeiro</option>
                      <option value="max-date" class="bg-slate-100 dark:bg-slate-800">Adicionado Por último</option>
                      <option value="completed-first" class="bg-slate-100 dark:bg-slate-800">Baixo Estoque</option>
                      <option value="uncompleted-first" class="bg-slate-100 dark:bg-slate-800">Alto Estoque</option>
                  </select>
      </form>
  </div>
  </div>



@foreach($materials as $material)

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="/img/pexels-jeshootscom-834892.jpg" alt="Card image cap">
  <div class="card-body">
  <input type="hidden" class="serdelete_val_id" value="{{ $material->id }}">
    <h3 class="card-title"><b>{{ $material->nome }}</b></h3>
    <p><b>Marca: </b>{{ $material->marca }}</p>
    <p><b>Quantidade: </b>{{ $material->quantidade }}</p>
    <p><b>Data de Entrada:</b> {{ date('d/m/Y', strtotime($material->created_at)) }}</p>
    <p class="card-text">Para Saber mais detalhes deste item <a href="{{ route('CivilProject-info', ['id' => $material->id]) }}" class="link-primary">Clique aqui</a></p>
    <div class="acoes">
              <a href="{{ route('CivilProject-edit', ['id' => $material->id]) }}">
              <button class="btn btn-primary">Editar</button>
              </a>
              <button type="button" class="btn btn-danger servideletebtn">Arquivar</button>
    </div>
  </div>
</div>

@endforeach
@endsection

@section('scripts')

  <script>

    $(document).ready(function () {

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
      $('.servideletebtn').click(function (e) { 

        var delete_id = $(this).closest("div.card-body").find('.serdelete_val_id').val();
        //alert(delete_id);

          Swal.fire({
            title: 'Você tem certeza?',
            text: "Esse item sairá do estoque! Porém você ainda poderá ter acesso ao registro na aba 'Arquivos'.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Arquivar!',
            cancelButtonText: 'Cancelar'

          }).then((result) => {
            if (result.isConfirmed) {
              var data = {
                  "_token": $('input[name="csrf-token"]').val(),
                  "id": delete_id,
              };
              $.ajax({
                type: "DELETE",
                url: '/'+delete_id,
                data: "data",
                success: function (response) {
                  Swal.fire(
                    'Arquivado!',
                    'Seu Registro foi Arquivado.',
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