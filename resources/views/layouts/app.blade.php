<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Login and Register</title>
    <!-- Menggunakan CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menambahkan file CSS lain jika diperlukan -->
    <link rel="stylesheet" href="{{ asset('lightbox2/dist/css/lightbox.min.css') }}">
</head>
<body>
<section>
    <h3>Two Individual Images</h3>
    <div>
      <a class="example-image-link" href="{{ asset('storage/image.png') }}" data-lightbox="roadtrip" data-title="Optional caption."><img class="example-image img-fluid mb-2" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-1.jpg" alt="image-1" /></a>
      <a class="example-image-link" href="{{ asset('storage/image.png') }}" data-lightbox="roadtrip" data-title="Optional caption."><img class="example-image img-fluid mb-2" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-2.jpg" alt="image-1"/></a>
    </div>

    <hr />

    <h3>A Four Image Set</h3>
    <div>
      <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="roadtrip" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/></a>
      <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="roadtrip" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
      <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="roadtrip" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-5.jpg" alt="" /></a>
      <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="roadtrip" data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-6.jpg" alt="" /></a>
    </div>
  </section>

  <section>
    <p>
      For more information, visit <a href="http://lokeshdhakar.com/projects/lightbox2/">http://lokeshdhakar.com/projects/lightbox2/</a>
    </p>
  </section>
    <div class="container">
        <!-- Konten halaman yang di-extend akan ditampilkan di sini -->
        @yield('content')
    </div>

    <!-- Mengimpor file JS dari CDN dan Lightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lightbox2/dist/js/lightbox-plus-jquery.min.js') }}"></script>
</body>
</html>