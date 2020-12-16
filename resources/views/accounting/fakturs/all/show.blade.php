@extends('templates.default')

@section('breadcrumb')
<h1>Fakturs<small>Detail</small></h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <a href="{{ route('accounting.fakturs.index') }}" type="button" class="btn btn-primary">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
            <div class="box-body">
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
                        <th class="text-right">Vendor Name</th>
                        <td>{{ $supplier->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Faktur Date</th>
                        <td>{{ date('d-M-Y', strtotime($faktur->faktur_date)) }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Amount</th>
                        <td>IDR {{ number_format($faktur->amount, 2) }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Posting Date</th>
                        <td>{{ date('d-M-Y', strtotime($faktur->posting_date)) }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Creation Date</th>
                        <td>{{ date('d-M-Y', strtotime($faktur->creation_date)) }}</td>
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
                        <td>@if($faktur->receive_date) {{ date('d-m-Y', strtotime($faktur->receive_date)) }} @endif</td>
                    </tr>
                    <tr>
                        <th class="text-right">Receive Updated By</th>
                        <td>{{ $faktur->receive_updated_by }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">eFaktur Date</th>
                        <td>@if($faktur->efaktur_date) {{ date('d-m-Y', strtotime($faktur->efaktur_date)) }} @endif</td>
                    </tr>
                    <tr>
                        <th class="text-right">eFaktur Updated By</th>
                        <td>{{ $faktur->efaktur_updatedby }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Imported at</th>
                        <td>{{ date('d-M-Y H:i:s', strtotime('+1 hour', strtotime($faktur->created_at))) }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Updated at</th>
                        <td>{{ date('d-M-Y H:i:s', strtotime('+1 hour', strtotime($faktur->updated_at))) }}</td>
                    </tr>
                </table>    
            </div>           
      </div>
  </div>
@endsection
