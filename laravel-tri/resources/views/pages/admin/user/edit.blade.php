@extends('layouts.admin.app')

@section('title', 'Users List')

@section('content')
<div class="container">
    <a href="/user" class="btn btn-primary mb-3">BACK</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="#">NAME</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter the name ...">
                </div>
                @error('name')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="#">EMAIL</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter the emal ...">
                </div>
                @error('email')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
@endsection