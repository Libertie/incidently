<!-- Photo file input -->
<div class="form-group">
    {{ Form::label('file', 'File') }}
    {{ Form::file('file', [
        'class' => 'form-control-file'
    ]) }}
    @error('file')
    <p class="form-text text-danger">{{ $message }}</p>
    @enderror
    <p class="form-text text-muted">
        Photo requirements here.
    </p>
</div>

<!-- Caption text input -->
<div class="form-group">
    {{ Form::label('caption') }}
    {{ Form::text('caption', NULL, [
        'class' => 'form-control'
    ]) }}
    @error('caption')
    <p class="form-text text-danger">{{ $message }}</p>
    @enderror
    <p class="form-text text-muted">
        Please indicate what this photo depicts.
    </p>
</div>