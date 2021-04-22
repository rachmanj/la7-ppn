@extends('templates.default')

@section('breadcrumb')
<h1>Invoices  <small><b>Monthly Average Process Days</b> </small></h1>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="box box-primary">
      <div class="box-header">
        @if (session('message'))
          <x-alert :type="session('type')" :message="session('message')"/>
        @endif
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="datatable-invoice" class="table table-bordered">
            <thead class="thead-primary">
                <tr>
                    <th>#</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Avg (days)</th>
                </tr>
            </thead>
          </table>
        </div>
      </div>
    </div> <!-- end box -->
  </div>
  <div class="col-lg-6">
    <div class="box box-primary">
      <div class="box-header">
        @if (session('message'))
          <x-alert :type="session('type')" :message="session('message')"/>
        @endif
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="datatable-invoice" class="table table-bordered">
            <thead class="thead-primary">
                <tr>
                    <th>#</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Avg (days)</th>
                </tr>
            </thead>
          </table>
        </div>
      </div>
    </div> <!-- end box -->
  </div>
</div>
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
        
    $('#datatable-invoice').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
            ajax: '{{ route('accounting.dashboard.test.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'year'},
                {data: 'month'},
                {data: 'days'},
            ],
            columnDefs: [
              {
                "targets": 3,
                "className": "text-right",
              }
            ],
            paging: false,
        });
    });
</script>
@endpush