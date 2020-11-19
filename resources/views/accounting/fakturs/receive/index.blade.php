@extends('templates.default')

@section('breadcrumb')
<h1>Fakturs<small>Faktur Belum Diterima</small></h1>
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        @if (session('message'))
          <x-alert :type="session('type')" :message="session('message')"/>
        @endif
        <a href="{{ route('accounting.fakturs.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Faktur</a>
      </div>
      <div class="box-body">
        <table id="datatable-faktur" class="table table-bordered table-striped">
          <thead class="thead-primary">
            <tr>
              <th>#</th>
              <th>Doc. No.</th>
              <th>Vendor</th>
              <th>Faktur No</th>
              <th>Faktur Date</th>
              <th>Inv. No</th>
              <th>PostD</th>
              <th>Amount</th>
              <th>SAP User</th>
              <th>Days</th>
              <th>action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div> <!-- End Row-->
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
        
    $('#datatable-faktur').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('accounting.fakturs.receive.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'document_no'},
                {data: 'vendor_code'},
                {data: 'faktur_no'},
                {data: 'faktur_date'},
                {data: 'invoice_no'},
                {data: 'posting_date'},
                {data: 'amount'},
                {data: 'sap_user'},
                {data: 'days'},
                {data: 'action'},
            ],
            columnDefs: [
              {
                "targets": [7,9],
                "className": "text-right"
              }
            ],
        });
    });
</script>
@endpush