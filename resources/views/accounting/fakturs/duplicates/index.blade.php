@extends('templates.default')

@section('breadcrumb')
<h1>Fakturs<small>Duplicate Fakturs</small></h1>
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
                {{-- <th>Doc. No.</th>
                <th>Created by</th> --}}
                <th>Faktur No</th>
                {{-- <th>Faktur Date</th>
                <th>Amount</th>
                <th>CreateD</th>
                <th>PostD</th> --}}
                <th>Occurences</th>
                {{-- <th>action</th> --}}
            </tr>
          </thead>
        </table>        
      </div>
    </div>
  </div>
</div><!-- End Row-->
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
            ajax: '{{ route('accounting.fakturs.duplicates.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                // {data: 'document_no'},
                // {data: 'created_by'},
                {data: 'faktur_no'},
                // {data: 'faktur_date'},
                // {data: 'amount'},
                // {data: 'creation_date'},
                // {data: 'posting_date'},
                {data: 'occurences'},
                // {data: 'action'},
            ]
        });
    });
</script>
@endpush