@extends('layouts.admin.app')

@section('title', 'Categories List')

@section('content')
<div class="container">
    <a href="/category" class="btn btn-primary mb-3">BACK</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="#">NAME</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter the name ...">
                </div>
                @error('name')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="#">SLUG</label>
                    <input type="text" name="slug" class="form-control" placeholder="Enter the slug ...">
                </div>
                @error('slug')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="#">META-TITLE</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="Enter the title ...">
                </div>
                @error('meta_title')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="#">META-DESCRIPTION</label>
                    <textarea name="meta_description" cols="30" rows="10" class="form-control" placeholder="Enter the description ..."></textarea>
                </div>
                @error('meta_description')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
@endsection