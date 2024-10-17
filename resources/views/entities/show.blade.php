@extends('layouts.app')

@section('title', 'Entitati')

@section('contents')
    <h1 class="mb-0">Detalii Entitate</h1>
    <hr />

    @if($entity)
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nume</label>
                <input type="text" name="nume" class="form-control" placeholder="Nume" value="{{ $entity->nume }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Eveniment</label>
                <input type="text" name="eveniment" class="form-control" placeholder="Eveniment" value="{{ optional($entity->event)->nume }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tip</label>
                <input type="text" name="tip" class="form-control" placeholder="Tip" value="{{ $entity->tip }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Created At</label>
                <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $entity->created_at }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Updated At</label>
                <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $entity->updated_at }}" readonly>
            </div>
        </div>
    @else
        <p>Entitatea nu există sau nu a fost găsită.</p>
    @endif
@endsection
