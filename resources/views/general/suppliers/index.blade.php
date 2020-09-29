@extends('templates.default')

@section('breadcrumb')
<h1>
  Suppliers
  <small>Suppliers</small>
</h1>
{{-- <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
</ol> --}}
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="box">
        <div class="box-header">
          @role(['superadmin', 'admin'])
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">
              <i class="fa fa-upload"></i> Upload Excel
            </button>
          @endrole
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="datatable-suppliers" class="table table-bordered">
              <thead class="thead-primary">
                  <tr>
                      <th>#</th>
                      <th>Code.</th>
                      <th>Name</th>
                      <th>action</th>
                  </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Import Excel -->

<div class="modal fade" id="importExcel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Import Suppliers</h4>
      </div>
      <form method="post" action="{{ route('general.suppliers.import_excel') }}" enctype="multipart/form-data">
        <div class="modal-body">
          {{ csrf_field() }}
              <label>Pilih file excel</label>
              <div class="form-group">
                  <input type="file" name="file" required="required">
              </div>
        </div>
        <div class="modal-footer with-border">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Import</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
    $(function() {
        
    $('#datatable-suppliers').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('general.suppliers.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'code'},
                {data: 'name'},
                {data: 'action'},
            ],
        });
    });
</script>
@endpush