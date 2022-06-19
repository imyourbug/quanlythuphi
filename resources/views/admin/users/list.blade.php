@extends('admin.users.main')
@section('content')
    <div class="col-md-12">
        <div class="card card-primary mt-3">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Last update</th>
                    <th>Action</th>
                </tr>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><a class="btn btn-primary btn-sm" href='/admin/users/edit/{{ $user->id }}'>
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow('{{ $user->id }}', '/admin/users/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>
@endsection
