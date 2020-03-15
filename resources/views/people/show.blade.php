@extends('layouts.default')

@section('content')

<h1>{{ $person->name ?: 'Name Unknown' }}</h1>
<?= $person->nickname ? "<p class=\"h2 text-muted\">{$person->nickname}</p>" : '' ?> 

<p class="lead">
    {{ $person->description }}
</p>


<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Description
            </div>
            <div class="card-body">
                <dl class="row">
<?php
foreach ([
    'hair_color', 'hair_length', 'facial_hair', 'height', 'Skin complexion' => 'skin', 'gender', 'voice', 'age'
] as $label => $property) :
?>
                    <dt class="col-6">{{ is_string($label) ? $label : ucwords(str_replace('_', ' ', $property)) }}:</dt>
                    <dd class="col-6">{{ ucwords($person->$property) ?: 'Unknown' }}</dd>
<?php
endforeach;
?>
                </dl>
            </div>
        </div>
    </div>
</div>

@endsection