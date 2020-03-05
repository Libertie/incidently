<div class="form-row mb-3">
@forelse ($incident->photos as $key => $photo)
    {{ Form::model($incident, [
        'route' => ['photos.destroy', $incident->id, $photo->id],
        'method' => 'delete',
        'class' => 'col-6 col-sm-4 col-md-2 col-lg-4 mb-2 d-relative'
    ]) }}
        <img
            src="{{ Storage::url($photo->file) }}"
            class="img-thumbnail img-fluid
            alt="Incident photo"
            title="{{ $photo->caption }}"
        >
        {{ Form::submit('x', [
            'onclick' => 'return confirm("Are you sure? The photo will be permanently removed.")',
            'title' => 'Delete photo',
            'class' => 'btn position-absolute',
            'style' => 'right:.5em'
        ]) }}
    {{ Form::close() }}
@empty
    <p>No photos have been added for this incident.</p>
@endforelse
</div>

<hr>