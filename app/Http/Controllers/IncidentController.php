<?php

namespace App\Http\Controllers;

use App\Incident;
use App\Http\Requests\StoreIncident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::with('types')->latest('occurred_at')->paginate(10);

        return view('incidents.index', compact('incidents'));
    }

    public function create()
    {
        $incident = new Incident;
        $people = \App\Person::orderBy('name')->pluck('name', 'id');
        $types = \App\Type::orderBy('name')->pluck('name', 'id');

        return view('incidents.create', compact(['incident', 'people', 'types']));
    }

    public function store(StoreIncident $request)
    {
        $validated = $request->validated();
        $incident = (new Incident($validated));
        $incident->save();
        $incident->people()->attach($request->people);
        $incident->types()->attach($request->types);

        return redirect(route('incidents.index'));
    }

    public function show(Incident $incident)
    {
        return view('incidents.show', compact(['incident']));
    }

    public function edit(Incident $incident)
    {
        $people = \App\Person::orderBy('name')->pluck('name', 'id');
        $types = \App\Type::orderBy('name')->pluck('name', 'id');

        return view('incidents.edit', compact(['incident', 'people', 'types']));
    }

    public function update(StoreIncident $request, $id)
    {
        $validated = $request->validated();
        $incident = Incident::findOrFail($id);
        $incident->people()->sync($request->people);
        $incident->types()->sync($request->types);
        $incident->update($validated);

        return redirect(route('incidents.show', [$incident->id]));
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();

        return redirect(route('incidents.index'));
    }
}
