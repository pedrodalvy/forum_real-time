<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testReplies()
    {
        $this->runSeeds();

        $response = $this->get('/threads/1');
        $response->assertStatus(200);

        $response = $this->get('/threads/2');
        $response->assertStatus(200);

        $response = $this->get('/threads/a');
        $response->assertStatus(400);
    }

    public function testThreadVisualization()
    {
        $this->runSeeds();

        $thread = \App\Models\Thread::find(1);

        $response = $this->get('/threads/1');
        $response->assertSee($thread->title);
        $response->assertSee($thread->body);
    }

    protected function runSeeds()
    {
        $this->seed('UserSeeder');
        $this->seed('ThreadSeeder');
        $this->seed('ReplySeeder');
    }
}
