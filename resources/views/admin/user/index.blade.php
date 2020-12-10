@extends('templates.default')

@section('breadcrumb')
    <h1>Users<small>List</small></h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header">
                @if (session('message'))
                    <x-alert :type="session('type')" :message="session('message')"/>
                @endif
                <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create</a>
            </div>
            <div class="box-body">
                
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
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
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
    </div>
</div>
@endsection