@extends('layouts.master2')

@section('content')
    <div class="user-info-container">
        <div class="user-info-box">
            <p>Nume utilizator: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
        </div>
        <div class="user-actions">
            <button class="action-button" onclick="location.href='{{ route('user.edit') }}'">Modificare Parolă</button>
            <button class="action-button" onclick="location.href='{{ route('user.delete') }}'">Ștergere Cont</button>
        </div>
    </div>
@endsection
