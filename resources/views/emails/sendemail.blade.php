<!DOCTYPE html>
<html>
    <head>
        <title>Praktikum Pemrograman Web</title>
    </head> 
    <body>
        <h2>Pengguna Baru Terdaftar</h2>
        <p><strong>Nama:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Deskripsi:</strong> {{ $data['body'] }}</p>
        <p>Terima kasih,</p>
    </body>
</html>