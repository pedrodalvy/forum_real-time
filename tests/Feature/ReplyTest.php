<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\User;
use App\Repositories\RepliesRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    public function testListagemDeRespostasPorTopico()
    {
        $this->runSeeds();

        $user = User::find(1);
        $replies = (new RepliesRepository(new Reply()))->showRepliesByThread(1);

        $response = $this->actingAs($user)
            ->json('GET', '/replies/1');

        $response->assertStatus(200)
            ->assertJsonFragment([$replies->toArray()[0]]);
    }

    public function testCadastroDeNovaResposta()
    {
        $user = factory(\App\Models\User::class)->create();
        $thread = factory(\App\Models\Thread::class)->create();

        $response = $this->actingAs($user)
            ->json('POST', '/replies', [
                'body' => 'All lagoons haul weird, clear girls.',
                'thread_id' => $thread->id,
                'user_id' => $user->id,
            ]);

        $reply = \App\Models\Reply::find(1);

        $response->assertStatus(200)
            ->assertSee($reply->id)
            ->assertSee($reply->thread_id)
            ->assertSee($reply->user_id)
            ->assertSee($reply->body);
    }

    protected function runSeeds()
    {
        $this->seed('UserSeeder');
        $this->seed('ThreadSeeder');
        $this->seed('ReplySeeder');
    }
}
