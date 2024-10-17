@extends('layouts.app')

@section('title', 'Profil')

@section('contents')
    <h1 class="mb-0">Profil</h1>
    <hr />

    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('profile') }}" >
        @csrf
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Setari de profil</h4>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Nume și Prenume</label>
                            <input type="text" name="name" class="form-control" placeholder="Nume și Prenume" value="{{ auth()->user()->nume_prenume }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Parolă</label>
                            <input type="password" name="password" class="form-control" placeholder="Parolă">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Confirmare Parolă</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmare Parolă">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Telefon</label>
                            <input type="text" name="phone" class="form-control" placeholder="Număr de telefon" value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Adresă</label>
                            <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}" placeholder="Adresă">
                        </div>
                    </div>

                    <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Salvează Profilul</button></div>
                </div>
            </div>
        </div>
    </form>
@endsection
