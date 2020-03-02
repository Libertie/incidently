<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncidentsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_incident()
    {
        $this->withoutExceptionHandling();

        $this->get('/incidents/create')->assertOk();

        $attributes = factory('App\Incident')->raw([
            'people' => factory('App\Person')->create()->id,
            'types' => factory('App\Type')->create()->id,
        ]);

        $this->post('/incidents', $attributes)
            ->assertRedirect(route('incidents.index'));
        $this->assertDatabaseHas('incidents', [
            'description' => $attributes['description']
        ]);
    }

    /** @test */
    public function a_user_can_edit_an_incident()
    {
        $this->withoutExceptionHandling();

        $incident = factory('App\Incident')->create();

        $this->get($incident->path() . '/edit')->assertOk();

        $this->patch($incident->path(), [
            'description' => 'Changed',
            'people' => factory('App\Person')->create()->id,
            'types' => factory('App\Type')->create()->id
        ])
            ->assertRedirect($incident->path());
        $this->assertDatabaseHas('incidents', ['description' => 'Changed']);
    }

    /** @test */
    public function a_user_can_view_an_incident()
    {
        $incident = factory('App\Incident')->create();

        $this->get($incident->path())
            ->assertOk()
            ->assertSee($incident->description);
    }

    /** @test */
    public function an_incident_requires_a_description()
    {
        $incident = factory('App\Incident')->raw([
            'description' => '',
            'people' => factory('App\Person')->create()->id,
            'types' => factory('App\Type')->create()->id
        ]);

        $this->post('/incidents', $incident)
            ->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_incident_requires_a_person()
    {
        $incident = factory('App\Incident')->raw([
            'types' => factory('App\Type')->create()->id
        ]);

        $this->post('/incidents', $incident)
            ->assertSessionHasErrors('people');
    }
}
