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

        $this->post($incident->path() . '/photos', $photo);

        Storage::disk('local')->assertExists('public/' . $file->hashName());

        $this->get($incident->path())
            ->assertSee($photo['caption']);
    }

    /** @test */
    public function an_incident_photo_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        Storage::fake('local');

        $photo = factory(Photo::class)->create([
            'file' => Storage::putFile('public', UploadedFile::fake()->image('photo.jpg'))
        ]);

        $this->assertDatabaseHas('photos', $photo->only(['id']));
        Storage::disk('local')->assertExists($photo->file);

        $this->delete($photo->path() . '/delete')
            ->assertDontSee($photo->caption);
        $this->assertDatabaseMissing('photos', $photo->only(['id']));    
        Storage::disk('local')->assertMissing($photo->file);
    }
}
