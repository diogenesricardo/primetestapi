<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class CrudUserTest extends TestCase
{

    protected $model = User::class;
    protected $endpoint = "users";

    public function createUser()
    {
        return factory($this->model)->create();
    }

    /**
     * GET /endpoint/
     * Should return 200 with data array
     *
     * @return void
     */
    public function testListUsers()
    {
        $response = $this->json('GET', "api/{$this->endpoint}");
        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => true
            ]);
    }

    /**
     * GET /endpoint/<id>
     * @return void
     */
    public function testShowUser()
    {
        // Create a test user with filled out fields
        $user = $this->createUser();
        // Check the API for the new entry
        $response = $this->json('GET', "api/{$this->endpoint}/{$user->id}");
        // Delete the test user
        $user->delete();
        $response
            ->assertStatus(200);
    }

    /**
     * DELETE /endpoint/<id>
     * Tests the destroy() method that deletes the user
     *
     * @return void
     */
    public function testDestroy()
    {
        $user = $this->createUser();
        $response = $this->json('DELETE', "api/{$this->endpoint}/{$user->id}");
        $response
            ->assertStatus(204);
    }

}
