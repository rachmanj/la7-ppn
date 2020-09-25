@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div>
        <h4>Update Penerimaan Faktur</h4>

        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('accounting.fakturnoreceive.index') }}" type="button" class="btn btn-sm btn-outline-primary pull-right m-1">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
              <div class="card-body">
                  <form action="{{ route('accounting.fakturnoreceive.update', $faktur->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive">
                        <table class="table">
                           <tr>
                               <th>Faktur No.</th>
                               <td>{{ $faktur->faktur_no }}</td>
                           </tr>
                           <tr>
                               <th>SAP Doc No</th>
                               <td>{{ $faktur->document_no }}</td>
                           </tr>
                           <tr>
                               <th>Vendor Code</th>
                               <td>{{ $faktur->vendor_code }}</td>
                           </tr>
                           <tr>
                               <th>Faktur Date</th>
                               <td>{{ $faktur->faktur_date }}</td>
                           </tr>
                           <tr>
                               <th>Amount</th>
                               <td>{{ $faktur->amount }}</td>
                           </tr>
                           <tr>
                               <th>Receive Date</th>
                               <td><input type="date" name="receive_date" class="form-control"></td>
                           </tr>
                           <tr>
                               <th>Creation Date</th>
                               <td>{{ $faktur->creation_date }}</td>
                           </tr>
                           <tr>
                               <th>Posting Date</th>
                               <td>{{ $faktur->posting_date }}</td>
                           </tr>
                           <tr>
                               <th>Project</th>
                               <td>{{ $faktur->project_code }}</td>
                           </tr>
                           <tr>
                               <th>Doc Type</th>
                               <td>{{ $faktur->doc_type }}</td>
                           </tr>
                           <tr>
                               <th>SAP User</th>
                               <td>{{ $faktur->sap_user }}</td>
                           </tr>
                           <tr>
                               <th>Remark</th>
                               <td>{{ $faktur->remark }}</td>
                           </tr>
                           <tr>
                               <th>Created By</th>
                               <td>{{ $faktur->created_by }}</td>
                           </tr>
                           <tr>
                               <th>Receive Updated By</th>
                               <td><input type="text" name="receive_updated_by" value="{{ auth()->user()->name }}"></td>
                           </tr>
                         </table>
                     </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-outline-success m-1">Save</button>
                    </form>
              </div>
            </div>

      </div>
    </div>
  </div>
@endsection
