<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/list.css') }}?v=1">
    <title>nanti index</title>
</head>
<body>
    
    <h1>List of Events</h1>
    <ul>
        @foreach($events as $event)
            <li>{{ $event->name }} - {{ $event->event_date }}</li>
        @endforeach
    </ul>
</body>
</html>
