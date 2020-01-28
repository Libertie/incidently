@extends('layouts.default')

@section('content')

    <h1>File a Report</h1>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert" aria-live="assertive">
        The form submission contains errors. Please see below and try again.
    </div>
    @endif

    {{ Form::open(['route' => 'incidents.store']) }}

        @include('forms.incident')

        {{ Form::submit('Submit', [
            'class' => 'btn btn-primary'
        ]) }}

    {{ Form::close() }}

@endsection