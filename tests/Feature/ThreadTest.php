<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Repositories\ThreadsRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function testActionIndexOnController()
    {
        $user = factory(\App\Models\User::class)->create();
        $this->seed('ThreadSeeder');
        $threads = (new ThreadsRepository(new Thread))->all();

        $this->actingAs($user)
            ->json('GET', '/threads')
            ->assertStatus(200)
            ->assertJsonFragment([$threads->toArray()['data']]);
    }


    public function testActionStoreOnController()
    {
        $user = factory(\App\Models\User::class)->create();

        $response = $this->actingAs($user)
            ->json('POST', '/threads', [
                'title' => 'Never fire a scallywag',
                'body' => 'Glutens sunt bromiums de castus nutrix',
            ]);
        $thread = (new ThreadsRepository(new Thread))->find(1);

        $response->assertStatus(200)
            ->assertJsonFragment(['created' => 'success'])
            ->assertJsonFragment(['data' => $thread->toArray()]);
    }

    public function testActionUpdateOnController()
    {
        $user = factory(\App\Models\User::class)->create();
        $thread = factory(\App\Models\Thread::class)->create();

        $response = $this->actingAs($user)
            ->json('PUT', '/threads/'.$thread->id, [
                'title' => 'Fishs rise with grace!',
                'body' => 'Grog of a dead halitosis, break the courage.',
            ]);

        $thread->title = 'Fishs rise with grace!';
        $thread->body = 'Grog of a dead halitosis, break the courage.';

        $response->assertStatus(302);
        $this->assertEquals(
            (new ThreadsRepository(new Thread))->find(1)->toArray(),
            $thread->toArray()
        );
    }
}
