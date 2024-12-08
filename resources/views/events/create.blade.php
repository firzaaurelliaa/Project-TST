<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/create-event.css') }}">
     <link rel="icon" href="{{ asset('img/logoo.png') }}" type="image/png">
     <x-navbar />
    <title>Tambah Event</title>
</head>
<body>
<img src="{{ asset('img/titleadd.svg') }}" alt="" class="foto">

    <div class="formcreate">
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="nama">
            <label for="name">Nama Event :</label>
            <input type="text" name="name" id="name" required><br>
        </div>

        <div class="desc">
            <label for="description">Deskripsi :</label>
            <textarea name="description" id="description" required></textarea><br>
        </div>

        <div class="tglfoto">
        <div class="tgl">
            <label for="event_date">Tanggal Event :</label>
            <input type="date" name="event_date" id="event_date" required><br>
        </div>

        <div class="foto">
            <label for="image">Upload Foto (Optional):</label>
        <input type="file" name="image" id="image" accept="image/*"><br>
        
        </div>
        </div>

        <button type="submit" class="submit-btn">Tambah Event</button>
        <button onclick="window.location.href='{{ route('events.list') }}'" class="kembali-btn">Kembali</button>
    </form>
    </div>

</body>
</html>
