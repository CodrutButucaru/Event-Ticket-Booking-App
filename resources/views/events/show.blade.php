@extends('layouts.app')

@section('title', 'Evenimente')

@section('contents')
    <h1 class="mb-0">Detalii Eveniment</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nume</label>
            <input type="text" name="nume" class="form-control" placeholder="Nume" value="{{ $event->nume }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Data și Ora</label>
            <input type="text" name="data_ora" class="form-control" placeholder="Data și Ora" value="{{ $event->data_ora }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Locatie</label>
            <input type="text" name="locatie" class="form-control" placeholder="Locatie" value="{{ $event->locatie }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Nr Bilete</label>
            <input type="text" name="nr_bilete" class="form-control" placeholder="Nr Bilete" value="{{ $event->nr_bilete }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Pret pe bilet</label>
            <input type="number" name="pret" class="form-control" placeholder="pret" value="{{ $event->pret }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Pret pe bilet</label>
            <input type="text" name="pret" class="form-control" placeholder="Pret" value="{{ $event->pret }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Agenda</label>
            <textarea class="form-control" name="agenda" placeholder="Agenda" readonly>{{ $event->agenda }}</textarea>
        </div>
        <div class="col mb-3">
            <label class="form-label">Afis</label>
            <input type="text" name="afis" class="form-control" placeholder="Afis" value="{{ $event->afis }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" placeholder="Contact" value="{{ $event->contact }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Speaker</label>
            <input type="text" name="speaker" class="form-control" placeholder="Speaker" value="{{ $event->speaker }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Parteneri</label>
            <input type="text" name="parteneri" class="form-control" placeholder="Parteneri" value="{{ $event->parteneri }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Sponsori</label>
            <input type="text" name="sponsori" class="form-control" placeholder="Sponsori" value="{{ $event->sponsori }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $event->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $event->updated_at }}" readonly>
        </div>
    </div>
@endsection
