<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class IncidentTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $incident = factory('App\Incident')->create();

        $this->assertEquals('/incidents/' . $incident->id, $incident->path());
    }
}
