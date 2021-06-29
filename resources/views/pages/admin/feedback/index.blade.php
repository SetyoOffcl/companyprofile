@extends('layouts.admin')

@section('title','Feedback')

@section('content')
<section class="section">
      <div class="section-header">
        <h1>Feedback</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{ route('/') }}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Feedback</a></div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="table">
              <thead>
                <tr class="bg-success text-white">
                  <td>Id</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Subject</td>
                  <td>Message</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">PERHATIAN</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <p><b>Jika menghapus Data</b></p>
              <p>*data tersebut akan hilang selamanya, apakah anda yakin?</p>
          </div>
          <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" name="delete" id="delete">Hapus
                  Data</button>
          </div>
      </div>
  </div>
</div>
@endsection
@push('after-script')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        var datatables = $('#table').DataTable({
            processing: true,
            // dom: 'Bfrtip',
            serverside: true,
            scrollX: false,
            ordering: true,
            autoWidth: false,
            language: {
                paginate: {
                    sNext: '<i class="fas fa-chevron-right"></i>',
                    sPrevious: '<i class="fas fa-chevron-left"></i>',
                    sFirst: '<i class="iconsminds-arrow-left-2"></i>',
                    sLast: '<i class="iconsminds-arrow-right-2"></i>'
                }
            },
            order: [[ 0, "desc" ]],
            ajax:{
                url : '{!! url()->current() !!}',
            },
            columns:[
                {data: 'id', name:'id' ,visible: false, searchable: false},
                {data: 'name' , name: 'name'},
                {data: 'email' , name: 'email'},
                {data: 'subject' , name: 'subject'},
                {data: 'message' , name: 'message'},
                {data: 'action' , name: 'action', width:'10%', searchable:false, orderable:false},
            ],
        });

    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal').modal('show');
    });

    $('#delete').click(function () {
        $.ajax({
            url: "{{ url('admin/feedback') }}/" + dataId, //eksekusi ajax ke url ini
            type: 'delete',
            beforeSend: function () {
                $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
            },
            success: function (data) { //jika sukses
                datatables.ajax.url('{!! url()->current() !!}').load();
                setTimeout(function () {
                    $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                    var oTable = $('#frame').dataTable();
                    oTable.fnDraw(true); //reset datatable
                });
            }
        })
    });

</script>
@endpush