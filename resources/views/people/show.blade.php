@extends('layouts.default')

@section('content')

<h1>{{ $person->name }}</h1>

<div class="card">
    <div class="card-header">
        Description
    </div>
    <div class="card-body">
        <p>
            Hair Color:
            {{ $person->hair_color }}
        </p>
        <p>
            Hair Length:
            {{ $person->hair_length }}
        </p>
        <p>
            Facial Hair:
            {{ $person->facial_hair }}
        </p>
        <p>
            Height:
            {{ $person->height }}
        </p>
        <p>
            Skin:
            {{ $person->skin }}
        </p>
        <p>
            Gender:
            {{ $person->gender }}
        </p>
        <p>
            Voice:
            {{ $person->voice }}
        </p>
        <p>
            Age:
            {{ $person->age }}
        </p>
        <p>
            {{ $person->description }}
        </p>
    </div>
</div>

@endsection