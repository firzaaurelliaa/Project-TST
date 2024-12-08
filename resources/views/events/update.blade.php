<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Menggunakan method PUT -->
    
    <label for="name">Event Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}" required><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required>{{ old('description', $event->description) }}</textarea><br>

    <label for="event_date">Event Date:</label>
    <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date) }}" required><br>

    <label for="image">Image (Optional):</label>
    <input type="file" name="image" id="image"><br>

    <button type="submit">Update Event</button>
    </form>

    <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
    @csrf
    @method('DELETE')
    <button type="submit" style="background: none; border: none; color: red; font-size: 24px; cursor: pointer; ">
        <i class="fa fa-trash"></i>
    </button>
</form>


</body>
</html>