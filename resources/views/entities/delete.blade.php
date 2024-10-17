<!-- resources/views/event_entities/delete.blade.php -->

@extends('layouts.admin_master2')

@section('content')
    <h1>Șterge Entitate Eveniment</h1>

    <p>Sigur doriți să ștergeți entitatea "{{ $entity->nume }}"?</p>

    <form method="POST" action="{{ route('entities.confirmDestroy', $entity->id) }}">
        @csrf
        @method('DELETE')

        <input type="hidden" name="confirmed" value="true">

        <button type="submit">Da, Șterge Entitate Eveniment</button>
    </form>

    <a href="{{ route('entities.index') }}">Anulează</a>
@endsection
