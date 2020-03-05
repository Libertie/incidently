<div id="incidentCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @for ($i = 0; $i < $incident->photos->count(); $i++)
            <li data-target="#incidentCarousel" data-slide-to="{{ $i }}" class="{{ $i ? '' : 'active' }}"></li>
        @endfor
    </ol>
    <div class="carousel-inner">
        @foreach ($incident->photos as $key => $photo)
        <div class="carousel-item {{ $key ? '' : 'active' }}">
            <img
                src="{{ Storage::url($photo->file) }}"
                class="d-block w-100"
                alt="Incident photo"
                title="{{ $photo->caption }}"
            >
        </div>                        
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#incidentCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#incidentCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>