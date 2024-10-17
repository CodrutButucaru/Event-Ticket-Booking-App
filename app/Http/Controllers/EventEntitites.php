<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Entitites;
use Illuminate\Http\Request;

class EventEntitites extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $eventEntities = Event_Entitites::all();
        return view('entities.index', compact('eventEntities'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $events = Event::all();

        return view('entities.create', compact('events'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'nume' => 'required|max:191',
            'tip' => 'required|in:sponsor,speaker,partener',
            'idEvent' => 'required|exists:events,id', // Verifică dacă idEvent există în tabela events
        ]);

        // Afișează datele validate în momentul trimiterii formularului
       // dd($validatedData);

        // Adaugă idEvent în validatedData
        $validatedData['idEvent'] = $request->idEvent;

        // Afișează din nou datele validate cu idEvent adăugat
       // dd($validatedData);

        // Încearcă să creezi instanța Event_Entitites
        Event_Entitites::create($validatedData);
        return redirect()->route('entities.index')->with('success', 'Entitatea evenimentului a fost creată cu succes!');
    }


    public function edit(EventEntitites $entity): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('entities.edit', compact('entity'));
    }

    public function update(Request $request, EventEntitites $entity): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'nume' => 'required|max:191',
            'tip' => 'required|in:sponsor,speaker,partener',
        ]);

        $entity->update($validatedData);

        return redirect()->route('entities.index')->with('success', 'Entitatea evenimentului a fost actualizată cu succes!');
    }

    public function destroy(EventEntitites $entity): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('entities.delete', compact('entity'));
    }

    public function confirmDestroy(EventEntitites $entity): \Illuminate\Http\RedirectResponse
    {
        $entity->delete();

        return redirect()->route('entities.index')->with('success', 'Entitatea evenimentului a fost ștearsă cu succes!');
    }


}
