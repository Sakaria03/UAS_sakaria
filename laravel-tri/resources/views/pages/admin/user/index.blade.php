@extends('layouts.admin.app')

@section('title', 'Users List')

@section('content')
    <div class="container">
        <a href="/user/create" class="btn btn-primary mb-3">ADD NEW USER</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th style="width: 5%">No</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 25%">Email</th>
                        <th style="width: 15%">Verified</th>
                        <th>Created Date</th>
                        <th style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $users)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->verified ? 'Yes' : 'No' }}</td>
                            <td>{{ $users->created_at }}</td>
                            <td>
                                <a href="{{ route('user.edit', $users->id) }}" class="btn btn-warning">EDIT</a>
                                <form action="{{ route('user.destroy', $users->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection