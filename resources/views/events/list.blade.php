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
   <div class="buttonadd">
        <button onclick="window.location.href='{{ route('events.create') }}'" style="background-color: #3E9ADD; border: none; color: white; padding: 10px 16px; border-radius: 6px; cursor: pointer;">
        <i class="fa-solid fa-plus"></i> Tambah Event
        </button>
   </div>


    <div class="title"><img src="img/title.svg" alt="" class="foto"></div>
    <div class="card-container">
        @foreach($events as $event)
            <div class="card">
               @if($event->image)
                    <img src="{{ asset('storage/images/' . $event->image) }}" alt="Event Image" style="width: 318px; height: 216px; object-fit: cover;" class="image">
                @endif

                <h1 class="name">{{ $event->name }}</h1>
                <p class="desc">{{ \Illuminate\Support\Str::limit($event->description, 190, '...') }}</p>
               <div class="icon">
                 <a href="{{ route('events.edit', $event->id) }}" class="btn btn-edit" style="color: #348AC9; font-size: 20px;">
                    <i class="fa-solid fa-pencil-alt"></i>
                </a>

                <a href="{{ route('events.destroy', $event->id) }}" class="btn btn-delete" 
                    style="color: red; font-size: 20px; cursor: pointer; padding: 0 16px;" 
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $event->id }}').submit();">
                    <i class="fa fa-trash"></i>
                </a>

                <form id="delete-form-{{ $event->id }}" action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
               </div>
                <div class="date">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</div>
            </div>
        @endforeach
    </div>

    <img src="img/gelombang.svg" alt="" class="gelombang">
</body>

</footer>


</html>
