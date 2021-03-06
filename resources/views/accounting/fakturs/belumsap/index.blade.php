@extends('templates.default')

@section('breadcrumb')
<h1>Fakturs<small>Faktur Belum SAP</small></h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            @if (session('message'))
              <x-alert :type="session('type')" :message="session('message')"/>
            @endif
          </div>
          <div class="box-body">
            <table id="datatable-faktur" class="table table-bordered">
              <thead class="thead-primary">
                <tr>
                    <th>#</th>
                    <th>Faktur No</th>
                    <th>Faktur Date</th>
                    <th>Vendor</th>
                    <th>Amount</th>
                    <th>CreateD</th>
                    <th>Days</th>
                    <th>action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
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
        
    $('#datatable-faktur').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('accounting.fakturs.belumsap.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'faktur_no'},
                {data: 'faktur_date'},
                {data: 'vendor_code'},
                {data: 'amount'},
                {data: 'created_at'},
                {data: 'days'},
                {data: 'action'},
            ],
            columnDefs: [
              {
                "targets": [4, 6],
                "className": "text-right"
              }
            ],
        });
    });
</script>
@endpush