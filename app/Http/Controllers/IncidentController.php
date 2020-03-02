<?php

namespace App\Http\Controllers;

use App\Incident;
use App\Http\Requests\StoreIncident;

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
        $incident = new Incident();

        $validated = collect($request->validated())
            ->only($incident->getFillable())
            ->toArray();
        $incident->fill($validated)->save();
        $incident->people()->attach($request->people);
        $incident->types()->attach($request->types);

        return redirect(route('incidents.index'))
            ->with('message', 'New report saved.');
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

    public function update(StoreIncident $request, Incident $incident)
    {
        $validated = collect($request->validated())
            ->only((new Incident())->getFillable())
            ->toArray();

        $incident->people()->sync($request->people);
        $incident->types()->sync($request->types);
        $incident->update($validated);

        return redirect(route('incidents.show', [$incident->id]))
            ->with('message', 'Report #' . sprintf('%05d', $incident->id) . ' updated.');
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();

        return redirect(route('incidents.index'));
    }
}
