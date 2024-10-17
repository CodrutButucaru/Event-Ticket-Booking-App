@extends('layouts.admin_master2')

@section('content')
    <div class="login-container">
        <div style="max-width: 400px; margin: auto; margin-top: 50px;">
            <h2 style="text-align: center;">Logheaza-te</h2>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Adresă de email:</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  style="width: 100%; padding: 8px; margin-bottom: 10px;">
                    @error('email')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="parola" required autocomplete="current-password" style="width: 100%; padding: 8px; margin-bottom: 10px;">
                    @error('password')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" style="background-color: #3498db; color: white; padding: 10px; border: none; width: 100%;">Login</button>

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

            <p style="margin-top: 10px; text-align: center;">Nu ai cont? <a href="{{ route('admin.register') }}">Înregistrează-te aici</a></p>
        </div>
    </div>
@endsection
