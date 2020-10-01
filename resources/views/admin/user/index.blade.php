@extends('templates.default')

@section('breadcrumb')
    <h3>Users <small>Pengguna</small></h3>
@endsection

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create</a>
    </div>
    <div class="box-body">
        @if (session('message'))
            <x-alert :type="session('type')" :message="session('message')"/>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {{$role->display_name}}
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                            @method('DELETE') @csrf
                            <div class="form-group" role="group" aria-label="Basic example">
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-footer">
        {{ $users->links() }}
    </div>
</div> <!-- Box -->
@endsection