@extends('layouts.master2')

@section('content')
    <div class="change-password-container">
        <h2>Modificare Parolă</h2>
        <form method="POST" action="{{ route('user.edit') }}">
            @csrf
            <div class="form-group">
                <label for="old_password">Parolă Veche</label>
                <input type="password" id="old_password" name="old_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Parolă Nouă</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">Confirmare Parolă Nouă</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>
            <button type="submit">Schimbă Parola</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
