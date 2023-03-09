@extends('Layouts.main')
@section('title')

@section('content')

{{-- add new ExtraHour modal start --}}
<div class="modal fade" id="addExtraHourModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New ExtraHour</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_ExtraHour_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
          <div class="col-lg">
              <label for="entrada">Entrada</label>
              <input type="time" name="entrada" class="form-control" placeholder="entrada" id="entrada" required>
          </div>
            <div class="col-lg">
              <label for="saida">Saida</label>
              <input type="time" name="saida" class="form-control" placeholder="saida" id="saida" required>
            </div>
          </div>
          <div class="my-2">
            <label for="funcionario">Funcionário</label>
            <input type="text" name="funcionario" class="form-control" placeholder="Nome do Funcionario" id="funcionario" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" id="add_ExtraHour_btn" class="btn btn-primary">Adicionar Registro</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new ExtraHour modal end --}}

{{-- edit ExtraHour modal start --}}
<div class="modal fade" id="editExtraHourModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit ExtraHour</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_ExtraHour_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="emp_id" id="emp_id">
        <div class="modal-body p-4 bg-light">
          <div class="row">
          <div class="col-lg">
              <label for="entrada">Entrada</label>
              <input type="time" name="entrada" id="entrada" class="form-control" placeholder="entrada" required>
          </div>
            <div class="col-lg">
              <label for="saida">Saida</label>
              <input type="time" name="saida" id="saida" class="form-control" placeholder="saida"required>
            </div>
          </div>
          <div class="my-2">
            <label for="funcionario">Funcionário</label>
            <input type="text" name="funcionario" id="funcionario" class="form-control" placeholder="Nome do Funcionario" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_ExtraHour_btn" class="btn btn-success">Update ExtraHour</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit ExtraHour modal end --}}

<div class="container py-5">
    <div class="row my-5">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-danger d-flex justify-content-between align-items-center">
                    <h3 class="text-light">Gerenciar Hora Extra</h3>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addExtraHourModal"><i class="bi-plus-circle me-2"></i>Adicionar Hora Extra</button>
                </div>
                <div class="card-body" id="show_all_ExtraHour">
                <table id="myTable" class="table table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th><input type="checkbox" id="select-all"></th>
                          <th scope="col" class="text-center">Funcionario</th>
                          <th scope="col" class="text-center">Entrada</th>
                          <th scope="col" class="text-center">Saida</th>
                          <th scope="col" class="text-center">Data</th>
                          <th scope="col" class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Ajax -->
                      </tbody><button type="button" class="btn btn-danger" id="deleteSelected" style="margin-bottom: 10px;">Delete Selected</button>
                    
                </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

      <script>
          $(document).ready( function () {
            $('#myTable').DataTable({
              processing: true,
              serverSide: true,
              dataType: "json",
              ordering: false,
              language: {
                  url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json"
              },
          
              ajax: {
                  url: "{{route('CivilProject-extra')}}",
                  method: 'GET',
              },
              columns: [
                  {
                      "data": null,
                      "className": "text-center",
                      "render": function (data, type, row) {
                          return '<input type="checkbox" name="emp[]" value="' + row.id + '"></td>';
                      }
                  },
                  {"data": "funcionario"},
                  {"data": "entrada"},
                  {"data": "saida"},
                  {"data": "created_at", 
                  "render": function(data, type, row) {
                      var dataObj = new Date(data);
                      var dia = dataObj.getDate().toString().padStart(2, '0');
                      var mes = (dataObj.getMonth() + 1).toString().padStart(2, '0');
                      var ano = dataObj.getFullYear();
                      return dia + '/' + mes + '/' + ano;
                    }
                  },
                  {
                      data: null,
                      className: "text-center",
                      render: function (data, type, row) {
                          return '<a href="#" id="'+ row.id +'" class="editIcon" data-bs-toggle="modal" data-bs-target="#editExtraHourModal">Editar</a>' +
                          '<a href="#" id="'+ row.id +'" class="text-danger mx-1 deleteIcon">Excluir</a>'
                      }
                  }
              ],
              columnDefs: [
                  {
                      targets: [0, 4, 5],
                      orderable: false
                  },
              ]
            })
          });
      </script>


      <script>
          // Add new ExtraHour with ajax request
        $("#add_ExtraHour_form").submit(function(e){
          e.preventDefault();
          const fd = new FormData(this);
          $("#add_ExtraHour_btn").text('Adding...');
          $.ajax({
            url: '{{ route('storeExtraHour') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success:function(res){
              if(res.status == 200) {
                Swal.fire(
                  'Added!',
                  'ExtraHour added successfully!',
                  'success'
                )
                // Refresh the DataTable
                $('#myTable').DataTable().draw();
              }
              $("#add_ExtraHour_btn").text('Add ExtraHour');
              $("#add_ExtraHour_form")[0].reset();
              $("#addExtraHourModal").modal('hide');
            }
          });
        });

      </script>


      <script>
          // preparing the data to edit it using ajax
        $(document).on('click', '.editIcon', function(e) {
          e.preventDefault();
          let id = $(this).attr('id');
          $.ajax({
            url: '{{ route('editExtraHour') }}',
            method: 'get',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            },
            success: function(res) {
            $("#entrada").val(res.entrada);
            $("#saida").val(res.saida);
            $("#funcionario").val(res.funcionario);
            
            }
          });
        }); 
      </script>

      <script>
         // Single delete using ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('deleteSingleExtraHour') }}',
              method: 'post',
              data: {
                id: id,
                _token : '{{ csrf_token() }}'
              },
              success: function(res) {
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                ) 
                // Refresh the DataTable
                $('#myTable').DataTable().draw();
              }
            })
          }
        });
      });
      </script>

      <script>
         // delete multiple data using ajax request
          $(document).on('click', '#select-all', function(e) {
            if ($(this).is(':checked')) {
              $('input[name="emp[]"]').prop('checked', true);
            }
            else {
              $('input[name="emp[]"]').prop('checked', false);
            }
          });
          $(document).on('click', '#deleteSelected', function(e) {
            e.preventDefault();
            // Check if any records are selected
            if (!$('input[name="emp[]"]:checked').length) {
              Swal.fire(
                'Error!',
                'Please select at least one record to delete.',
                'error'
              )
              return;
            }
            let ids = [];
          // iterate over selected checkboxes to get IDs of selected records
          $('input[name="emp[]"]:checked').each(function () {
              ids.push($(this).val());
          });
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: '{{ route('deleteSelectedExtraHour') }}',
                    method: 'post',
                    data: {
                      emp: ids,
                      _token : '{{ csrf_token() }}'
                    },
                    success: function(res) {
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      ) 
                      // Refresh the DataTable
                      $('#myTable').DataTable().draw();
                    }
                  })
                }
              });
          });
    </script>

@endsection