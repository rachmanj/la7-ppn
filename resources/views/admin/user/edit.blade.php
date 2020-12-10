@extends('templates.default')

@section('breadcrumb')
    <h1>User<small>Edit Data</small></h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header with-border">
                <a class="btn btn-primary" href="{{ route('admin.user.index') }}"><i class="fa fa-undo"></i> Back</a>
            </div>
            <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
            <div class="box-body">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-7">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>

                    <div class="col-md-7">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username}}" autocomplete="off" disabled>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-7">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="off">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role_id" class="col-md-3 col-form-label text-md-right">{{ __('Role') }}</label>

                    <div class="col-md-7">
                        <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            @if (count($roles))
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->roles[0]->id ? 'selected="selected"' : '' }}>{{ $role->display_name }}</option>
                            @endforeach
                            @endif
                        </select>

                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            <div class="box-footer with-border">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection