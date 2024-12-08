<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/update-event.css') }}">
    <link rel="icon" href="{{ asset('img/logoo.png') }}" type="image/png">
    <x-navbar />
    <title>Update Event</title>
</head>
<body>
    <!-- <img src="{{ asset('img/edit.svg') }}" alt="Update Event Title" class="title-image"> -->

    <h1>Edit Event</h1>

    <div class="form-container">
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 

            <!-- Nama Event -->
            <div class="form-group">
                <label for="name">Nama Event:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" required>{{ old('description', $event->description) }}</textarea>
            </div>

            <!-- Tanggal dan Foto -->
            <div class="form-row">
                <div class="form-group">
                    <label for="event_date">Tanggal Event:</label>
                    <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date) }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Upload Foto (Optional):</label>
                    <input type="file" name="image" id="image" accept="image/*">
                </div>
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Update Event</button>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus Event</button>
                </form>
            </div>
    </form>

       

         <button type="button" onclick="window.location.href='{{ route('events.list') }}'" class="btn btn-secondary">Kembali</button>
    </div>
</body>
</html>
