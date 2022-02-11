@extends('templates.default')

@section('breadcrumb')
<h1>Invoices  <small><b>Invoice Process Days</b> </small></h1>
@endsection

@section('content')
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">This Year</span>
        <span class="info-box-number">{{ number_format($thisYear_avg, 2) }}<small> days</small></span>
        <p>Invoice Process Days</p>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">This Month</span>
        <span class="info-box-number">{{ number_format($thismonth_avg, 2) }}<small> days</small></span>
        <p>Invoices-Process Days</p>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">This Month</span>
        <span class="info-box-number">{{ $thisMonth_count }}<small> invoices</small></span>
        <p>Invoices Received at BPN</p>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">This Month</span>
        <span class="info-box-number">{{ $processedThisMonth_count }} <small>invoices</small></span>
        <p>Invoices Processed</p>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
  <div class="col-lg-3">
    <div class="box box-primary">
      <div class="box-header">
        <h4>This Year ({{ date('Y') }})</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="datatable-invoice" class="table table-bordered">
            <thead class="thead-primary">
                <tr>
                    <th class="text-center">Month</th>
                    <th class="text-right">Avg (days)</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($monthly_avg as $item)
                  <tr>
                    <td class="text-left">{{ date('F', strtotime('2021-0' . $item['month'] . '-01')) }}</td>
                    <td class="text-right">{{ number_format($item['days'], 2) }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- end box -->
  </div>
  <div class="col-lg-6">
    <div class="box box-primary">
      <div class="box-header">
        <h4>This Year ({{ date('Y') }})</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="datatable-invoice" class="table table-bordered">
            <thead class="thead-primary">
                <tr>
                    <th>Month</th>
                    <th>Creator</th>
                    <th class="text-center">Count</th>
                </tr>
            </thead>
            <tbody>
              {{-- @foreach ($countByCreatorThisYear_get as $item)
                  <tr>
                    <td>{{ $item['month'] }}</td>
                    <td>{{ $item['creator'] }}</td>
                    <td class="text-right">{{ $item['count'] }}</td>
                  </tr>
              @endforeach --}}
            </tbody>
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

@endpush