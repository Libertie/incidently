@extends('layouts.default')

@section('content')

    <h1>Incident Report</h1>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert" aria-live="assertive">
        The form submission contains errors. Please see below and try again.
    </div>
    @endif

    <p>
        Report submitted on {{ Carbon\Carbon::parse($incident->created_at)->format('M d, Y') }}.
        @if ($incident->created_at != $incident->updated_at)
        Updated on {{ Carbon\Carbon::parse($incident->updated_at)->format('M d, Y') }}.
        @endif
    </p>

    {{ Form::model($incident, [
        'route' => ['incidents.update', $incident->id],
        'method' => 'patch'
    ]) }}

        @include('forms.incident')

        {{ Form::submit('Update', [
            'class' => 'btn btn-primary'
        ]) }}
        <a href="{{ route('incidents.destroy', ['incident' => $incident->id]) }}" class="btn btn-danger">Delete</a>

    {{ Form::close() }}

@endsection