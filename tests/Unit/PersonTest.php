<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $person = factory('App\Person')->create();

        $this->assertEquals('/people/' . $person->id, $person->path());
    }
}
