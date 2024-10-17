@extends('layouts.master2')

@section('content')
    <div class="events-container">
        <!-- Arată lista de evenimente -->
        @foreach ($events as $event)
            <div class="event-card">
                <a href="{{ route('event.show', $event->id) }}">
                    <img src="{{ asset($event->afis) }}" alt="{{ $event->nume }}" class="event-image">
                    <h3>{{ $event->nume }}</h3>
                </a>
                <p class="event-description">{{ substr($event->descriere, 0, 15) }}...</p>
            </div>
        @endforeach
    </div>


    <style>
        .events-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .event-card {
            width: 23%; /* Să fie aproximativ 4 pe rând */
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .event-card:hover {
            transform: scale(1.05);
        }

        .event-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .event-description {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>

@endsection
