@extends('layouts.app')

@section('title', 'Home Event')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary">Adauga Eveniment</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Nume</th>
            <th>Data & Ora</th>
            <th>Descriere</th>
            <th>Locatie</th>
            <th>Numar Bilete</th>
            <th>Agenda</th>
            <th>Afis</th>
            <th>Contact</th>
            <th>Speakert</th>
            <th>Parteneri</th>
            <th>Sponsori</th>

        </tr>
        </thead>
        <tbody>+
        @if($events->count() > 0)
            @foreach($events as $rs)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs->nume }}</td>
                    <td class="align-middle">{{ $rs->data_ora }}</td>
                    <td class="align-middle">{{ $rs->descriere }}</td>
                    <td class="align-middle">{{ $rs->locatie }}</td>
                    <td class="align-middle">{{ $rs->nr_bilete }}</td>
                    <td class="align-middle">{{ $rs->agenda }}</td>
                    <td class="align-middle">{{ $rs->afis }}</td>
                    <td class="align-middle">{{ $rs->contact }}</td>
                    <td class="align-middle">{{ $rs->speaker }}</td>
                    <td class="align-middle">{{ $rs->parteneri }}</td>
                    <td class="align-middle">{{ $rs->sponsori }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('events.show', $rs->id) }}" type="button" class="btn btn-secondary">Detali</a>
                            <a href="{{ route('events.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('events.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Evenimentul nu a fost gasit!</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
