@extends('templates.default')

@section('breadcrumb')
<h1>Fakturs<small>Receive Faktur</small></h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                @if (session('message'))
                  <x-alert :type="session('type')" :message="session('message')"/>
                @endif
                <a href="{{ route('accounting.fakturs.receive_index') }}" class="btn btn-md btn-primary"><i class="fa fa-undo"></i> Back</a>
            </div>
            <form action="{{ route('accounting.fakturs.update', $faktur->id) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>SAP Doc No</dt>
                    <dd>{{ $faktur->document_no }}</dd>
                    <dt>Doc Type</dt>
                    <dd>{{ $faktur->doc_type }}</dd>
                    <div class="form-group @error('faktur_no') has-error @enderror">
                        <dt class="form-group text-red">FAKTUR NO</dt>
                        <dd><input type="text" name="faktur_no" class="form-control" value="{{ old('faktur_no', $faktur->faktur_no) }}">@error ('faktur_no') {{ $message }} @enderror</dd>
                    </div>
                    <dt>Faktur Date</dt>
                    <dd>{{ date('d-M-Y', strtotime($faktur->faktur_date)) }}</dd>
                    <dt>Posting Date</dt>
                    <dd>{{ date('d-M-Y', strtotime($faktur->posting_date)) }}</dd>
                    <dt>Creation Date</dt>
                    <dd>{{ date('d-M-Y', strtotime($faktur->creation_date)) }}</dd>
                    <dt>Vendor Code</dt>
                    <dd>{{ $faktur->vendor_code }}</dd>
                    <dt>Vendor Name</dt>
                    @if ($supplier)
                    <dd>{{ $supplier->name }}</dd>
                    @endif
                    <dt>Invoice No</dt>
                    <dd>{{ $faktur->invoice_no }}</dd>
                    <dt>Amount</dt>
                    <dd>IDR {{ number_format($faktur->amount, 2) }}</dd>
                    <div class="form-group @error ('receive_date') has-error @enderror">
                        <dt class="text-red">RECEIVE DATE: </dt>
                    <dd><input type="date" name="receive_date" class="form-control">@error ('receive_date') {{ $message }} @enderror</dd>
                    </div>
                    <dt>Project</dt>
                    <dd>{{ $faktur->project_code }}</dd>
                    <dt>Invoice Remarks</dt>
                    <dd>{{ $faktur->invoice_remarks }}</dd>
                    <hr>
                    <dt>SAP User</dt>
                    <dd>{{ $faktur->sap_user }}</dd>
                </dl>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
