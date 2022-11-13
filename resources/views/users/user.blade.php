@extends('layout.main')

@section('main_content')
    @if (session('message'))
        <div class="alert alert-info" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2>User List</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-info"> <i class="fa fa-plus"></i> New User</a>
        </div>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users TABLE</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->group->title }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="text-center">
                                    {{-- <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info">Edit</a> --}}
                                    <form method="POST" action=" {{ route('users.destroy', ['user' => $user->id]) }} ">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('users.show', ['user' => $user->id]) }}">
                                            <i class="fa fa-eye "></i> </a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('users.edit', ['user' => $user->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
