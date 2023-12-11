@extends('layouts.admin.app')

@section('title', 'Categories List')

@section('content')
<div class="container">
    <a href="/category/create" class="btn btn-primary mb-3">ADD DATA</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th style="width: 5%">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Meta-Title</th>
                    <th scope="col">Meta-Description</th>
                    <th style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->meta_title }}</td>
                        <td>{{ $category->meta_description }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">EDIT</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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