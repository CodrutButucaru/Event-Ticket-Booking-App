<!-- resources/views/event_entities/index2.blade.php -->

@extends('layouts.admin_master2')

@section('content')
    <h1>Entități Eveniment</h1>

    <ul>
        @foreach($eventEntities as $entity)
            <li>{{ $entity->nume }} - {{ $entity->tip }}</li>
        @endforeach
    </ul>

    <a href="{{ route('entities.create') }}">Adaugă Entitate Eveniment</a>
@endsection
