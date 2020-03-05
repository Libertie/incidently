@extends('layouts.default')

@section('content')

    <h1>Incident Report #{{ sprintf('%05d', $incident->id) }}</h1>

    <p>
        Report submitted on {{ Carbon\Carbon::parse($incident->created_at)->format('M d, Y') }}
        by {{ $incident->submitted_by }}.
        @if ($incident->created_at != $incident->updated_at)
        Updated on {{ Carbon\Carbon::parse($incident->updated_at)->format('M d, Y') }}.
        @endif
    </p>

    <div class="card-deck">
        <div class="card">
            <div class="card-body align-middle d-flex">
                <div class="text-center align-self-center w-100">
                    @foreach ($incident->types as $type)
                    <span class="display-4">{{ $type->name }}</span><br />
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card">
            @if ($incident->photos->count())
                @include('elements.photo-carousel')
            @endif
            <div class="card-body {{ $incident->photos->count() ? 'row' : '' }}">
                <div class="col">
                    <p class="card-title"><strong>Date</strong></p>
                    <p>{{ Carbon\Carbon::parse($incident->occurred_at)->format('M d, Y') }}</p>
                </div>
                <div class="col">
                    <p class="card-title"><strong>Time</strong></p>
                    <p>{{ Carbon\Carbon::parse($incident->occurred_at)->format('g:ma') }}</p>
                </div>
                <div class="col">
                    <p class="card-title"><strong>Location</strong></p>
                    <p>{{ $incident->location }}</p>
                </div>
            </div>
        </div>
    </div>

    <p class="jumbotron my-4 py-4">{{ $incident->description }}</p>

    <div class="card">
        <div class="card-body row">
            <div class="col">
                <p class="card-title"><strong>Individuals involved</strong></p>
                <ul>
                    @foreach ($incident->people as $person)
                    <li>{{ $person->name }}</li>
                    @endforeach
                    @if ($incident->leo)
                    <li class="text-danger">Law enforcement</li>
                    @endif
                </ul>
            </div>
            <div class="col">
                <p class="card-title"><strong>Witnesses</strong></p>
                <p>{{ $incident->witnessed_by }}</p>
            </div>
        </div>
    </div>

    <a href="{{ route('incidents.edit', ['incident' => $incident->id]) }}" class="btn btn-primary mt-3">Edit Report</a>

@endsection