<!DOCTYPE html>
<html>
<head>
    <title>Pesan dari Form Kontak</title>
</head>
<body>
    <h2>Anda menerima pesan baru dari form kontak</h2>
    <p><strong>Nama:</strong> {{ $nama }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Subjek:</strong> {{ $subject }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $pesan }}</p>
</body>
</html>
