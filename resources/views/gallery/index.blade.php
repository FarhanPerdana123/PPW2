@extends('auth.layouts')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        @if (count($galleries) > 0)
                            @foreach ($galleries as $gallery)
                                {{-- {{ dd($gallery->picture); }} --}}
                                <div class="col-sm-2">
                                    <div>
                                        <a href="{{ asset('storage/posts_image/' . $gallery->picture) }}"
                                            class="example-image-link" data-lightbox="roadtrip"
                                            data-title="{{ $gallery->description }}">
                                            <img src="{{ asset('storage/posts_image/' . $gallery->picture) }}" alt="image-1"
                                                class="example-img img-fluid mb-2">
                                        </a>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}"
                                            class="btn btn-sm btn-warning mt-2">Edit</a>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mt-2"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>Tidak ada data.</h3>
                        @endif
                        <div class="d-flex">
                            {{ $galleries->links() }}
                        </div>
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary d-block mt-2">add image</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection