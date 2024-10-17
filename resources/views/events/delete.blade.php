@extends('layouts.admin_master2')

@section('content')
    <h1>Confirmare Ștergere Eveniment</h1>

    <p>Sunteți sigur că doriți să ștergeți evenimentul "{{ $event->nume }}"?</p>

    <form action="{{ route('events.destroy', $event) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Da, Șterge Eveniment</button>
    </form>

    <a href="{{ route('events.show', $event) }}">Anulează</a>
@endsection
