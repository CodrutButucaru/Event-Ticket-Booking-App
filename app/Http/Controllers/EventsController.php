<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $events = Event::all();
        // Logica pentru afișarea evenimentelor din baza de date
        return view('events.showEvents', compact('events'));
    }

    public function cos(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Logica pentru afișarea coșului de cumpărături
        return view('cos');
    }

    public function addToCos($id): \Illuminate\Http\RedirectResponse
    {
        // Logica pentru adăugarea unui eveniment în coșul de cumpărături
        $event = Event::findOrFail($id);
        $cart = session()->get('cos', []);

        if (isset($cart[$id])) {
            $cart[$id]["quantity"] += 1;
        } else {
            $cart[$id] = [
                "nume" => $event->nume,
                "data_ora" => $event->data_ora,
                "locatie" => $event->locatie,
                "nr_bilete" => $event->nr_bilete,
                "agenda" => $event->agenda,
                "pret" => $event->pret,
                "quantity" => 1
            ];
        }

        session()->put('cos', $cart);
        return redirect()->back()->with('success', 'Produs adaugat cu succes!');


    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cos');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cos', $cart);
            session()->flash('success', 'Cosul a fost actualizat cu succes');
            return redirect()->back();
        }
    }

    public function remove(Request $request): void
    {    if($request->id) {
        $cos = session()->get('cos');
        if(isset($cos[$request->id])) {
            unset($cos[$request->id]);
            session()->put('cos', $cos);
        }
        session()->flash('success', 'Produs sters!');
    }
    }

 /*   public function session(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Logica pentru gestionarea sesiunilor
        $value = $request->session()->get('key', 'default');

        // ...

        return view('events.session', ['value' => $value]);
    }*/

}
