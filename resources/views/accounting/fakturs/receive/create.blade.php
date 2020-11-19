@extends('templates.default')

@section('breadcrumb')
  <h1>Faktur<small> New Faktur</small></h1>
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <a href="{{ route('accounting.fakturs.receive_index') }}" class="btn btn-primary"><i fa fa-undo></i> Back</a>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="{{ route('accounting.fakturs.store') }}" method="POST" class="form-horizontal">
        @csrf
        <div class="box-body">
          <div class="form-group @error('faktur_no') has-error @enderror">
            <label for="faktur_no" class="col-sm-2 control-label">Faktur No *</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="faktur_no" name="faktur_no" value="{{ old('faktur_no') }}">
              @error('faktur_no')
              <span class="help-block" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>
  
          <div class="form-group @error('faktur_date') has-error @enderror">
            <label for="faktur_date" class="col-sm-2 control-label">Faktur Date *</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="faktur_date" name="faktur_date" value="{{ old('faktur_date') }}">
              @error('faktur_date')
              <span class="help-block" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>
  
          <div class="form-group @error('supplier_code') has-error @enderror">
            <label for="supplier_code" class="col-sm-2 control-label">Supplier *</label>
            <div class="col-sm-10">
              <select type="text" class="form-control select2" id="supplier_code" name="supplier_code">
                <option value="">-- select --</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->code }}">{{ $supplier->code .' - '. $supplier->name }}</option>
                @endforeach
              </select>
              @error('supplier_code')
              <span class="help-block" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="form-group @error('amount') has-error @enderror">
            <label for="amount" class="col-sm-2 control-label">Amount *</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
              @error('amount')
              <span class="help-block" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="form-group @error('receive_date') has-error @enderror">
            <label for="receive_date" class="col-sm-2 control-label">Receive Date*</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="receive_date" name="receive_date" value="{{ old('receive_date') }}">
              @error('receive_date')
              <span class="help-block" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer with-border">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>

</div>  
@endsection

@push('styles')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}"> 
@endpush

@push('scripts')
<!-- bootstrap datepicker -->
<script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
$(document).ready(function() {
  //Initialize Select2 Elements
    $('.select2').select2()
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
});
</script>

@endpush