@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="box">
            <form action="{{ route('accounting.fakturs.update', $faktur->id) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="box-header with-border">
                @if (session('message'))
                  <x-alert :type="session('type')" :message="session('message')"/>
                @endif
                <a href="{{ route('accounting.fakturs.receive_index') }}" class="btn btn-md btn-primary pull-right"><i class="fa fa-undo"></i> Back</a>
                <h3>Faktur Detail</h3>
            </div>
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>SAP Doc No</dt>
                    <dd>{{ $faktur->document_no }}</dd>
                    <dt>Faktur No</dt>
                    <dd>{{ $faktur->faktur_no }}</dd>
                    <dt>Vendor Code</dt>
                    <dd>{{ $faktur->vendor_code }}</dd>
                    <dt>Project</dt>
                    <dd>{{ $faktur->project_code }}</dd>
                    <dt>Amount</dt>
                    <dd>IDR {{ number_format($faktur->amount, 2) }}</dd>
                    <dt>Receive Date</dt>
                    <dd><input type="date" name="receive_date"></dd>
                </dl>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-md">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection