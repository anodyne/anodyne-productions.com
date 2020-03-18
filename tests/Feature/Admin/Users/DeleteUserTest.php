<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use Domain\Account\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var  User
     */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    /** @test **/
    public function authorizedUserCanDeleteUser()
    {
        $this->signInWithPermission('user.delete');

        $response = $this->deleteJson(route('admin.users.destroy', $this->user));

        $this->followRedirects($response)->assertOk();

        $this->assertSoftDeleted('users', $this->user->only('id', 'email'));
    }

    /** @test **/
    public function unauthorizedUserCannotDeleteUser()
    {
        $this->signIn();

        $this->deleteJson(route('admin.users.destroy', $this->user))
            ->assertForbidden();
    }

    /** @test **/
    public function guestCannotDeleteUser()
    {
        $this->delete(route('admin.users.destroy', $this->user))
            ->assertRedirect(route('login'));
    }

    /** @test **/
    public function cannotDeleteAnodyneAccount()
    {
        $anodyne = $this->createUser([
            'email' => 'admin@anodyne-productions.com',
        ]);

        $user = $this->signInWithPermission('user.delete');

        $response = $this->deleteJson(route('admin.users.destroy', $anodyne));

        $response->assertForbidden();

        $this->assertDatabaseHas('users', $anodyne->only('id', 'email'));
    }
}
