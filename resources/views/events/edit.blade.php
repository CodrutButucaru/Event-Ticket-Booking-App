@extends('layouts.app')

@section('title', 'Editeaza Eveniment')

@section('contents')
    <h1 class="mb-0">Editeaza Eveniment</h1>
    <hr />
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nume</label>
                <input type="text" name="nume" class="form-control" placeholder="Nume" value="{{ $event->nume }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Data & Ora</label>
                <input type="text" name="data_ora" class="form-control" placeholder="Data & Ora" value="{{ $event->data_ora }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Descriere</label>
                <textarea class="form-control" name="descriere" placeholder="Descriere">{{ $event->descriere }}</textarea>
            </div>
            <div class="col mb-3">
                <label class="form-label">Locatie</label>
                <input type="text" name="locatie" class="form-control" placeholder="Locatie" value="{{ $event->locatie }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Numar Bilete</label>
                <input type="text" name="nr_bilete" class="form-control" placeholder="Numar Bilete" value="{{ $event->nr_bilete }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Pret pe bilet</label>
                <input type="number" name="pret" class="form-control" placeholder="pret" value="{{ $event->pret }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Agenda</label>
                <textarea class="form-control" name="agenda" placeholder="Agenda">{{ $event->agenda }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Afis</label>
                <input type="text" name="afis" class="form-control" placeholder="Afis" value="{{ $event->afis }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control" placeholder="Contact" value="{{ $event->contact }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Speaker</label>
                <input type="text" name="speaker" class="form-control" placeholder="Speaker" value="{{ $event->speaker }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Parteneri</label>
                <input type="text" name="parteneri" class="form-control" placeholder="Parteneri" value="{{ $event->parteneri }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Sponsori</label>
                <input type="text" name="sponsori" class="form-control" placeholder="Sponsori" value="{{ $event->sponsori }}" >
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
