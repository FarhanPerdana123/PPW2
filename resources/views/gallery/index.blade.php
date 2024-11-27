@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row" id="gallery-container">
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary d-block mt-2">Add Image</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            loadGalleries();

            function loadGalleries() {
                $.ajax({
                    url: '/api/galleries',
                    method: 'GET',
                    success: function(data) {
                        $('#gallery-container').empty();
                        if (data.data.length > 0) {
                            data.data.forEach(function(gallery) {
                                $('#gallery-container').append(`
                                    <div class="col-sm-2">
                                        <div>
                                            <a href="{{ asset('storage/posts_image/') }}/${gallery.picture}"
                                                class="example-image-link" data-lightbox="roadtrip"
                                                data-title="${gallery.description}">
                                                <img src="{{ asset('storage/posts_image/') }}/${gallery.picture}" alt="image-1"
                                                    class="example-img img-fluid mb-2">
                                            </a>
                                            <a href="/gallery/${gallery.id}/edit" class="btn btn-sm btn-warning mt-2">Edit</a>
                                            <form action="/gallery/${gallery.id}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mt-2"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                `);
                            });
                        } else {
                            $('#gallery-container').append('<h3>Tidak ada data.</h3>');
                        }
                    },
                    error: function() {
                        $('#gallery-container').append('<h3>Terjadi kesalahan saat memuat data.</h3>');
                    }
                });
            }

            $(document).on('submit', '.delete-form', function(e) {
                e.preventDefault();
                if (confirm('Are you sure?')) {
                    const form = $(this);
                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: form.serialize(),
                        success: function() {
                            loadGalleries();
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat menghapus data.');
                        }
                    });
                }
            });
        });
    </script>
@endsection