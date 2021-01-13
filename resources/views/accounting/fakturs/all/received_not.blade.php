@extends('templates.default')

@section('breadcrumb')
<h1>Fakturs   <small>  <a href="{{ route('accounting.fakturs.index') }}">All</a> | <a href="{{ route('accounting.fakturs.receive_already_index') }}">Received</a> | <b>Not Received</b></small></h1>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-header">
        @if (session('message'))
              <x-alert :type="session('type')" :message="session('message')"/>
            @endif
        <a href="{{ route('accounting.fakturs.notreceive_export_excel') }}" class="btn btn-primary"><i class="fa fa-download"></i> Export to Excel</a>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="datatable-faktur" class="table table-bordered">
            <thead class="thead-primary">
                <tr>
                    <th>#</th>
                    <th>Doc. No.</th>
                    <th>Vendor</th>
                    <th>Faktur No</th>
                    <th>Faktur Date</th>
                    <th>Amount</th>
                    <th>ReceiveD</th>
                    <th>CreateD</th>
                    <th>PostD</th>
                    <th>action</th>
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
        
    $('#datatable-faktur').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('accounting.fakturs.receive_not.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'document_no'},
                {data: 'vendor_code'},
                {data: 'faktur_no'},
                {data: 'faktur_date'},
                {data: 'amount'},
                {data: 'receive_date'},
                {data: 'creation_date'},
                {data: 'posting_date'},
                {data: 'action'},
            ],
            columnDefs: [
              {
                "targets": 5,
                "className": "text-right"
              }
            ],
        });
    });
</script>
@endpush