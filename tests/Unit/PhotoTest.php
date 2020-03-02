<?php

namespace Tests\Unit;

use App\Incident;
use App\Photo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class PhotoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_an_incident()
    {
        $photo = factory(Photo::class)->create();
        $this->assertInstanceOf(Incident::class, $photo->incident);
    }

    /** @test */
    public function it_has_a_path()
    {
        $photo = factory(Photo::class)->create();
        $this->assertEquals("/incidents/{$photo->incident->id}/photos/{$photo->id}", $photo->path());
    }
}
