<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('index');
//return view('welcome');
    }

    public function index2(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $events = Event::all();
        return view('events.index2', compact('events'));
    }


    public function showEvents(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application //pagina evenimentelor
    {
        $events = Event::paginate(16); // Paginare cu 16 evenimente pe pagină
        return view('events.showEvents', compact('events'));
    }

    public function showEvent($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application //pagina unui eveniment
    {
        $event = Event::findOrFail($id);
        return view('events.showEvent', compact('event'));
    }



    public function pag2($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $event = Event::findOrFail($id);
        return view('events.pag2', compact('event'));
    }

    public function pag3($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $event = Event::findOrFail($id);
        return view('events.pag3', compact('event'));
    }

    public function pag4($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $event = Event::findOrFail($id);
        return view('events.pag4', compact('event'));

    }

    public function pag5($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $event = Event::findOrFail($id);
        return view('events.pag5', compact('event'));

    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Afișează formularul de creare a unui eveniment
        return view('events.create');
    }

    public function store(Request $request)
    {
        Event::create($request->all());

        return redirect()->route('events')->with('success', 'Eveniment adaugat cu succes!');
    }

    public function show(string $id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }


    public function update(Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $event = Event::findOrFail($id);

        $event->update($request->all());

        return redirect()->route('events')->with('success', 'Eveniment actualizat cu succes!');
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('events')->with('success', 'Evenimentul a fost sters cu succes!');
    }


}
