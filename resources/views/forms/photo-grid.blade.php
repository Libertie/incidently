<div class="form-row mb-3">
@forelse ($incident->photos as $key => $photo)
    <div class="col-6 col-sm-4 col-md-2 col-lg-4 mb-2 d-relative">
        <img
            src="{{ Storage::url($photo->file) }}"
            class="img-thumbnail img-fluid
            alt="Incident photo"
            title="{{ $photo->caption }}"
        >
        <a
            href="{{ route('photos.destroy', [$incident->id, $photo->id]) }}"
            class="btn position-absolute"
            data-method="delete"
            data-confirm="Are you sure? The photo will be permanently removed."
            style="right:.5em">x
        </a>
    </div>
@empty
    <p>No photos have been added for this incident.</p>
@endforelse
</div>

<hr>