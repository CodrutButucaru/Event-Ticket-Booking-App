<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;


class AdminController extends Controller
{
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        return view('admins.index');
    }

    public function showLogoutForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admins.admin_logout');
    }

    public function logout(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();

        return redirect('/');
    }

    public function showLoginForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admins.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validează datele primite din formular
        $request->validate([
            'email' => 'required|email',
            'parola' => 'required|string',
        ]);

        // Încercă să autentifici utilizatorul
        if (! Auth::guard('admin')->attempt($request->only('email', 'parola'))) {
            // Autentificare reușită
            $request->session()->regenerate();

            // Redirecționează utilizatorul către pagina de destinație sau către '/'
            return redirect()->intended('/admin/panel');
        }

        // Autentificare eșuată
        return back()->withErrors([
            'email' => 'Datele de autentificare sunt incorecte.',
        ]);
    }

    public function showRegistrationForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admins.register');
    }

    public function register(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        // Validează datele primite din formular
        $request->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|email|unique:admins,email', // Schimbată aici pentru a verifica unicitatea în tabela admins
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Verificați dacă adresa de e-mail este validă.
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withErrors(['email' => 'Adresa de e-mail nu este validă.']);
        }

        if (!$this->isStrongPassword($request->password)) {
            return redirect()->back()->withErrors(['password' => 'Parola trebuie să aibă cel puțin 8 caractere și să conțină o combinație de litere, cifre și caractere speciale.']);
        }

        // Hashați parola înainte de a o stoca în baza de date.
        $password = bcrypt($request->password);

        // Creează un nou utilizator în baza de date (admins, nu users)
        $admin = Admin::create([
            'nume_prenume' => $request->name,
            'email' => $request->email,
            'parola' => $password,
        ]);

        // redirectioneaza utilizatorul catre pagina de start
        return redirect('/admin/login'); // Am schimbat aici pentru a folosi numele rutei
    }


    private function isStrongPassword($password)
    {
        // Implementează condițiile pentru o parolă puternică
        return strlen($password) >= 8 && preg_match('/[A-Za-z]/', $password) && preg_match('/\d/', $password) && preg_match('/[^A-Za-z\d]/', $password);
    }





}
