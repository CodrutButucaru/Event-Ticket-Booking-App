@extends('layouts.master2')
@section('content')
    <body>
    <div style="max-width: 400px; margin: auto; margin-top: 50px;">
        <h2 style="text-align: center;">Înregistrare</h2>

        <form method="POST" action="{{ route('user.register') }}">
            <!-- generează un token CSRF pentru a proteja împotriva atacurilor CSRF-->
            @csrf

            <label for="name">Nume:</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

            <label for="email">Adresă de email:</label>
            <input type="email" id="email" name="email" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

            <label for="password">Parolă:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

            <label for="password_confirmation">Confirmare parolă:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

            <button type="submit" style="background-color: #3498db; color: white; padding: 10px; border: none; width: 100%;">Înregistrează-te</button>

        </form>
        <p style="margin-top: 10px; text-align: center;">Ai deja cont? <a href="{{ route('user.login') }}">Autentifică-te aici</a></p>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </body>
@endsection
