@extends('templates.default')

@section('breadcrumb')
    <h1>User<small> Profile</small></h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header with-border">
                @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')"/>
                @endif
            </div>
            <div class="box-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-7">
                            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-md-3 control-label">Username</label>
                        <div class="col-md-7">
                            <input id="username" type="text" class="form-control" name="username" value="{{$user->username}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-3 control-label">Email Address</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                        </div>
                    </div>


                <div class="box-footer with-border">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-pencil"></i> Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modal-primary fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Change Password</h4>
        </div>

        <form method="POST" action="{{ route('admin.user.change_password', auth()->user()) }}">
            @csrf @method('PUT')
            <div class="modal-body">           

                <div class="form-group row">
                    <label for="current_password" class="col-md-4 col-form-label text-md-right">Current Password</label>
    
                    <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
    
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new_password" class="col-md-4 col-form-label text-md-right">New Password</label>
    
                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
    
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>
    
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="new_confirm_password" required>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Save</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection