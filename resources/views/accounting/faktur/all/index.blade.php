@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page  style="height:600px"-->
        <h4>List of Faktur</h4>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                @role(['superadmin', 'admin'])
                  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#importExcel">
                      <i class="fa fa-upload"></i> Upload Excel
                  </button>
                  @endrole
              </div>
              <div class="card-body">
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
                            <th>CreateD</th>
                            <th>PostD</th>
                            <th>action</th>
                        </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Row-->

      </div>
    </div>
  </div>

  <!-- Import Excel -->

  <div class="modal fade" id="importExcel">
    <div class="modal-dialog">
      <div class="modal-content animated rollIn">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-star"></i> Upload File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('accounting.fakturall.import_excel') }}" enctype="multipart/form-data">
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
    <!--Data Tables -->
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('script')
    <!--Data Tables js-->
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function() {
        
    $('#datatable-faktur').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('accounting.fakturall.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'document_no'},
                {data: 'vendor_code'},
                {data: 'faktur_no'},
                {data: 'faktur_date'},
                {data: 'amount'},
                {data: 'creation_date'},
                {data: 'posting_date'},
                {data: 'action'},
            ]
        });
    });
</script>
@endpush