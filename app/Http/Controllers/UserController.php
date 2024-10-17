<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegistrationForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.register');
    }

    public function register(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        // Validează datele primite din formular
        $request->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Verificați dacă adresa de e-mail este validă.
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withErrors(['email' => 'Adresa de e-mail nu este validă.']);
        }

        if (!$this->isStrongPassword($request->password)) {
            return redirect()->back()->withErrors(['password' => 'Parola trebuie să aibă cel puțin 8 caractere și să conțină o combinație de litere, cifre și caractere speciale.']);
        }

        // Verificați dacă parola este suficient de sigură.
        //if (!Hash::needsRehash($request->password)) {
        //return redirect()->back()->withErrors(['password' => 'Parola trebuie să aibă cel puțin 8 caractere și să conțină o combinație de litere, cifre și caractere speciale.']);
        //  }

        // Hashați parola înainte de a o stoca în baza de date.
        $password = bcrypt($request->password);

        // Creează un nou utilizator în baza de date
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        // redirectioneaza utilizatorul catre pagina de start
        return redirect('/user/login');
    }

    private function isStrongPassword($password)
    {
        // Implementează condițiile pentru o parolă puternică
        return strlen($password) >= 8 && preg_match('/[A-Za-z]/', $password) && preg_match('/\d/', $password) && preg_match('/[^A-Za-z\d]/', $password);
    }


    public function showLoginForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.login');
    }
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validează datele primite din formular
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Încercă să autentifici utilizatorul
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autentificare reușită
            $request->session()->regenerate();

            // Redirecționează utilizatorul către pagina de destinație sau către '/'
            return redirect()->intended('/');
        }

        // Autentificare eșuată
        return back()->withErrors([
            'email' => 'Datele de autentificare sunt incorecte.',
        ]);
    }

    public function showLogoutForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.logout');
    }

    public function logout(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();

        return redirect('/');
    }

    public function userInfo(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    public function show(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();

        return view('users.show', compact('user'));
    }

    public function deleteForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.delete');
    }
    public function delete(): \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application|\Illuminate\Routing\Redirector
    {
        $user = Auth::user();
        // Șterge utilizatorul și deconectează-l
        $user->delete();
        Auth::logout();

        return redirect('/')->with('success', 'Contul a fost șters cu succes.');
    }

    public function showEditPasswordForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.edit');
    }

    public function editPassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // verifica daca parola veche e corecta
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Parola veche este incorectă.']);
        }

        // Verifică dacă parola nouă este diferită de cea veche
        if (Hash::check($request->new_password, $user->password)) {
            return redirect()->back()->withErrors(['new_password' => 'Parola nouă trebuie să fie diferită de cea veche.']);
        }

        // Schimbă parola utilizatorului
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('user.show')->with('success', 'Parola a fost modificată cu succes.');
    }




}
