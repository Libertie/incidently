@extends('layouts.default')

@section('content')

    <h1>Incidents</h1>

    <p>Showing {{ $incidents->firstItem() }} - {{ $incidents->lastItem() }} of {{ $incidents->total() }} incidents</p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Submitter</th>
                <th scope="col">Type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($incidents as $incident)
            <tr>
                <td>{{ sprintf('%05d', $incident->id) }}</td>
                <td>{{ Carbon\Carbon::parse($incident->occurred_at)->format('M d, Y') }}</td>
                <td>{{ $incident->submitted_by }}</td>
                <td>{{ $incident->types->pluck('name')->implode(', ') }}</td>
                <td><a href="{{ $incident->path() }}">View</a></td>
            </tr>
            @empty
            <tr><td colspan="5">No incidents yet</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $incidents->links() }}

@endsection