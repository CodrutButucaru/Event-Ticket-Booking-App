@extends('layouts.app')

@section('title', 'Creaza Eveniment')

@section('contents')
    <h1 class="mb-0">Adauga Eveniment</h1>
    <hr />
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_ora">Data și Ora:</label>
            <input type="datetime-local" name="data_ora" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descriere">Descriere:</label>
            <textarea name="descriere" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="locatie">Locatie:</label>
            <input type="text" name="locatie" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nr_bilete">Număr Bilete:</label>
            <input type="number" name="nr_bilete" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pret">Pret pe bilet:</label>
            <input type="number" name="pret" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="agenda">Agenda:</label>
            <textarea name="agenda" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="afis">Afis:</label>
            <input type="text" name="afis" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" name="contact" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="speaker">Speaker:</label>
            <input type="text" name="speaker" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="parteneri">Parteneri:</label>
            <input type="text" name="parteneri" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sponsori">Sponsori:</label>
            <input type="text" name="sponsori" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salveaza Eveniment</button>
    </form>
@endsection
