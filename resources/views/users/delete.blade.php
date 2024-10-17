@extends('layouts.master2')
@section('content')
    <div style="max-width: 400px; margin: auto; margin-top: 50px; text-align: center;">
        <h2>Sunteți sigur că doriți să vă stergeti contul?</h2>
        <form method="POST" action="{{ route('user.delete') }}">
            @csrf
            <button type="submit" style="background-color: #3498db; color: white; padding: 10px; border: none; width: 100%;">Da</button>
        </form>
        <br>
        <a href="{{ url('/') }}">Înapoi la site</a>
    </div>
@endsection
