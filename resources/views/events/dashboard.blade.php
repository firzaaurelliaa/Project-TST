<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/list.css') }}?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('img/logoo.png') }}" type="image/png">
    <title>Event Terdekat</title>
    <x-navbar />
</head>

<body>
    <div class="title"><img src="img/title.svg" alt="" class="foto"></div>
    <div class="card-container">

        @foreach($events as $event)
            <div class="card" onclick="window.location.href='{{ route('events.detail', ['id' => $event->id]) }}'">
                <!-- @if($event->image) -->
                <img src="{{ asset('asset/BgLanding 3.jpg') }}" alt="{{ $event->name }}"
                style="width: 318px; height: 216px; object-fit: cover;" class="image">
                    <!-- <img src="{{ asset('storage/images/' . $event->image) }}" alt="Event Image"
                                style="width: 318px; height: 216px; object-fit: cover;" class="image"> -->
                    <!-- <img src="/asset/BgLanding 3.jpg" alt="{{ $event->name }}"
                        style="width: 318px; height: 216px; object-fit: cover;" class="background-image"> -->
                <!-- @endif -->

                <h1 class="name">{{ $event->name }}</h1>
                <p class="desc">{{ \Illuminate\Support\Str::limit($event->description, 190, '...') }}</p>
                <div class="icon">

                </div>
                <div class="date">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</div>
            </div>
        @endforeach
    </div>

    <img src="img/gelombang.svg" alt="" class="gelombang">

</body>

</footer>


</html>