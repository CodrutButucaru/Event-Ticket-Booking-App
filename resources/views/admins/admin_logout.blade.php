@extends('layouts.admin_master2')
@section('content')
<div style="max-width: 400px; margin: auto; margin-top: 50px; text-align: center;">
    <h2>Sunteți sigur că doriți să vă deconectați?</h2>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" style="background-color: #3498db; color: white; padding: 10px; border: none; width: 100%;">Da</button>
    </form>
    <br>

</div>

@endsection
