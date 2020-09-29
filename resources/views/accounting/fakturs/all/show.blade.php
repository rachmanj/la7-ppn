@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div>
        
        <div class="col-lg-10">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Faktur Detail</h4>
                    <a href="{{ route('accounting.fakturs.index') }}" type="button" class="btn btn-primary pull-right">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
              <div class="panel-body">
                <div class="table-responsive">
                 <table class="table">
                    <tr>
                        <th class="text-right">Faktur No.</th>
                        <td>{{ $faktur->faktur_no }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">SAP Doc No</th>
                        <td>{{ $faktur->document_no }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Vendor Code</th>
                        <td>{{ $faktur->vendor_code }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Faktur Date</th>
                        <td>{{ $faktur->faktur_date }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Amount</th>
                        <td>{{ $faktur->amount }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Creation Date</th>
                        <td>{{ $faktur->creation_date }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Posting Date</th>
                        <td>{{ $faktur->posting_date }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Project</th>
                        <td>{{ $faktur->project_code }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Doc Type</th>
                        <td>{{ $faktur->doc_type }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">SAP User</th>
                        <td>{{ $faktur->sap_user }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Remark</th>
                        <td>{{ $faktur->remark }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Created By</th>
                        <td>{{ $faktur->created_by }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Receive Date</th>
                        <td>{{ $faktur->receive_date }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Receive Updated By</th>
                        <td>{{ $faktur->receive_updated_by }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Imported at</th>
                        <td>{{ date('d-m-Y H:i:s', strtotime('+1 hour', strtotime($faktur->created_at))) }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Updated at</th>
                        <td>{{ date('d-m-Y H:i:s', strtotime('+1 hour', strtotime($faktur->updated_at))) }}</td>
                    </tr>
                  </table>
              </div>
              </div>
            </div>

      </div>
    </div>
  </div>
@endsection
