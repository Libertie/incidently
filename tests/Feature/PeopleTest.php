<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PeopleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_view_a_person()
    {
        $person = factory('App\Person')->create();

        $this->get($person->path())
            ->assertOk()
            ->assertSee($person->description);
    }
}
