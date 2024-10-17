@extends('layouts.master2')

@section('content')
    <div class="event-details-container">
        <div class="event-image">
            <img src="{{ asset('img/' . $event->afis) }}" alt="{{ $event->nume }}" class="event-image">
        </div>
        <div class="event-info">
            <h1>{{ $event->nume }}</h1>
            <div class="parteneri-container">
                <h3>Parteneri:</h3>
                <ul>
                    <p>{{ $event->parteneri }}</p>
                </ul>
            </div>
            <div class="sponsor-container">
                <h3>Sponsori:</h3>
                <ul>
                    <p>{{ $event->sponsori }}</p>
                </ul>
            </div>
            <p><strong>Număr Bilete Disponibile:</strong> {{ $event->nr_bilete }}</p>
        </div>
    </div>



    <a href="{{ route('event.showEvent', $event->id) }}">Descriere & data</a>
    <a href="{{ route('event.pag2', $event->id) }}">Agenda</a>
    <a href="{{ route('event.pag3', $event->id) }}">Speakers</a>
    <a href="{{ route('event.pag5', $event->id) }}">Contact & Locatia evenimentului</a>

    <style>
        .event-details-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .event-image {
            flex: 0 0 40%;
        }

        .event-image img {
            max-width: 300px;
            height: 400px;
            border-radius: 5px;
        }

        .event-info {
            flex: 0 0 55%;
        }

        .speakers-container {
            margin-top: 20px;
        }

        .speakers-container h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .speakers-container ul {
            list-style-type: none;
            padding: 0;
        }

        .speakers-container li {
            margin-bottom: 5px;
        }
    </style>

@endsection
