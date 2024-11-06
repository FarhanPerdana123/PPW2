@extends('auth.layouts')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
            @if ($user->photo)
                <img src="{{ asset('storage/'.$user->photo) }}" alt="User Photo" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection