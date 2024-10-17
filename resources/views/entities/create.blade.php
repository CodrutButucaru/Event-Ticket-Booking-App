<!-- resources/views/event_entities/create.blade.php -->

@extends('layouts.admin_master2')

@section('content')
    <h1>Adaugă Entitate Eveniment</h1>

    <form action="{{ route('entities.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="idEvent">Selectează Eveniment:</label>
            <select name="idEvent" id="idEvent" class="form-control" required>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->nume }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tip">Selectează Tipul:</label>
            <select name="tip" id="tip" class="form-control" required>
                <option value="sponsor">Sponsor</option>
                <option value="speaker">Speaker</option>
                <option value="partener">Partener</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvează Entitate Eveniment</button>
    </form>

    <a href="{{ route('entities.index') }}">Înapoi la Lista de Entități</a>
@endsection

