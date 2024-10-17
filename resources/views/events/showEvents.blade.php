@extends('layouts.master2')

@section('content')
    <div class="events-container">

        @foreach ($events as $event)
            <div class="event-card">
                <a href="{{ route('event.showEvent', $event->id) }}">
                    <img src="{{ asset('img/' . $event->afis) }}" alt="{{ $event->nume }}" class="event-image">
                    <h3>{{ $event->nume }}</h3>
                    <p><strong>Pret: </strong> Ron{{ $event->pret }}</p>
                    <a href="{{ url('/cos') }}">

                        <p class="btn-holder"><a href="{{ route('add_to_cos', $event->id) }}" class="btn btn-primary btn-block text-center" role="button">Adauga in cos</a> </p>
                        @csrf
                    </a>
                <p class="event-description">{{ substr($event->descriere, 0, 150) }}...</p>
                </a>
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
            width: 18%;
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
