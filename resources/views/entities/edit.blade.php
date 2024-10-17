<!-- resources/views/event_entities/edit.blade.php -->

@extends('layouts.admin_master2')

@section('content')
    <h1>Editează Entitate Eveniment</h1>

    <form method="POST" action="{{ route('entities.update', $entity->id) }}">
        @csrf
        @method('PUT')

        <label for="nume">Nume:</label>
        <input type="text" name="nume" value="{{ $entity->nume }}" required>

        <label for="tip">Tip:</label>
        <select name="tip" required>
            <option value="sponsor" {{ $entity->tip === 'sponsor' ? 'selected' : '' }}>Sponsor</option>
            <option value="speaker" {{ $entity->tip === 'speaker' ? 'selected' : '' }}>Speaker</option>
            <option value="partener" {{ $entity->tip === 'partener' ? 'selected' : '' }}>Partener</option>
        </select>

        <button type="submit">Actualizează Entitate Eveniment</button>
    </form>

    <a href="{{ route('entities.index') }}">Înapoi la Lista de Entități</a>
@endsection
