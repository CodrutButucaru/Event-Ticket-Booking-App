@extends('layouts.master2')

@section('content')
    <div class="event-details-container">
        <div class="form-group">
            <label for="afis">Afis:</label>
            <input type="file" name="afis" class="form-control-file" accept="image/*" required>
        </div>

        <div class="event-info">
            <h1>{{ $event->nume }}</h1>
            <p><strong>Agenda:<br></strong> {!! nl2br(e($event->agenda)) !!}</p>

            <p><strong>Număr Bilete Disponibile:</strong> {{ $event->nr_bilete }}</p>
        </div>
    </div>

    <a href="{{ route('event.showEvent', $event->id) }}">Descriere & Data</a>
    <a href="{{ route('event.pag3', $event->id) }}">Speakers</a>
    <a href="{{ route('event.pag4', $event->id) }}">Parteneri & Sponsori</a>
    <a href="{{ route('event.pag5', $event->id) }}">Contact & Locația


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
    </style>

@endsection
