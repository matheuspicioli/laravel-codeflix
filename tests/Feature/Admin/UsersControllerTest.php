<?php

namespace Tests\Feature\Admin;

use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;
use CodeFlix\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIfUserDoesntSeeUsersList()
    {
        $this->get(route('admin.users.index'))
            ->assertRedirect(route('admin.login'))
            ->assertStatus(302);
    }

    public function testIfUserSeeUsersList()
    {
        Model::unguard();
        $user = factory(User::class)->states('admin')->create(['verified' => true]);
        //actiginAs - logando um usuário
        $this->actingAs($user)
            ->get(route('admin.users.index'))
            ->assertSee('Usuários');
    }
}
