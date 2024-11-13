@extends('auth.layouts')
@section('content')
<form action="{{ route('gallery.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 row mt-3">
        <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
        <div class="col-md-6">
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
        <div class="col-md-6">
            <textarea name="description" id="description" rows="5" class="form-control">{{ $post->description }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="input-file" class="col-md-4 col-form-label text-md-end text-start">File Input</label>
        <div class="col-md-6">
            <div class="input-group">
                <input type="file" name="picture" id="input-file" class="custom-file-input">
                <label for="input-file" class="custom-file-label">Choose File</label>
            </div>
            @if($post->picture)
                <img src="{{ asset('storage/posts_image/'.$post->picture) }}" width="100" class="mt-3">
            @endif
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection