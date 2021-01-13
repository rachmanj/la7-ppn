@extends('templates.default')

@section('breadcrumb')
<h1>Fakturs   <small> <a href="{{ route('accounting.fakturs.index') }}">All</a> | <b>Received</b> | <a href="{{ route('accounting.fakturs.receive_not_index') }}">Not Received</a> </small></h1>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-header">
        @if (session('message'))
              <x-alert :type="session('type')" :message="session('message')"/>
            @endif
        <a href="{{ route('accounting.fakturs.export_excel') }}" class="btn btn-primary"><i class="fa fa-download"></i> Export to Excel</a>
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

  <!-- Import Excel -->

  <div class="modal fade" id="importExcel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-star"></i> Upload File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('accounting.fakturs.import_excel') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>
          
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Import</button>
                    </div>
            </form>
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
            ajax: '{{ route('accounting.fakturs.receive_already.data') }}',
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