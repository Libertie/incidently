<?php

namespace Tests\Feature;

use App\Incident;
use App\Photo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PhotosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_incident_can_have_photos()
    {
        $this->withoutExceptionHandling();

        Storage::fake('local');

        $file = UploadedFile::fake()->image('photo.jpg', rand(0, 100), rand(0, 100));
        $incident = factory(Incident::class)->create();
        $photo = factory(Photo::class)->raw([
            'file' => $file
        ]);

        $response = $this->post($incident->path() . '/photos', $photo);

        Storage::disk('local')->assertExists('uploads/' . $file->hashName());

        /*
        $this->get($incident->path())
            ->assertSee($photo['caption']);
            */
    }
}
