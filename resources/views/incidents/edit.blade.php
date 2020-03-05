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

    <div class="row">

        {{ Form::model($incident, [
            'route' => ['incidents.update', $incident->id],
            'method' => 'patch',
            'class' => 'col-12 col-lg-6 mb-3'
        ]) }}

            @include('forms.incident')

            {{ Form::submit('Update', [
                'class' => 'btn btn-primary'
            ]) }}
            <a href="{{ route('incidents.destroy', ['incident' => $incident->id]) }}" class="btn btn-danger">
                Delete
            </a>

        {{ Form::close() }}

        <div class="jumbotron col-12 col-lg-6 py-3 px-3">
            <h2 class="mb-3">Manage Photos</h2>

            @include('forms.photo-grid')

            <h3>Add a Photo</h3>

            {{ Form::model($incident, [
                'files' => true,
                'route' => ['photos.store', $incident->id]
            ]) }}

                @include('forms.photo')

                {{ Form::submit('Submit', [
                    'class' => 'btn btn-secondary'
                ]) }}

            {{ Form::close() }}
        </div>

    </div>

@endsection