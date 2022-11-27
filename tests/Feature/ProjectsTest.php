<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_a_user_can_create_a_project ()
    {
        // it disables the exception handling that comes with Laravel and displays the error in the terminal
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    public function test_a_project_require_a_title ()
    {
        // create () will build the attributes and save to the database;
        // make () will only build the attributes;
        // raw () will build the attributes and store as an array;
        $attributes = Project::factory()->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title'); // Assert that the session has the given errors
    }

    public function test_a_project_require_a_description ()
    {
        $attributes = Project::factory()->raw(['description' => '']);
        
        $this->post('/projects', $attributes)->assertSessionHasErrors('description'); // Assert that the session has the given errors
    }
}
