<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use Domain\Account\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewUserTest extends TestCase
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
    public function authorizedUserCanViewUser()
    {
        $this->signInWithPermission('user.view');

        $response = $this->get(route('admin.users.show', $this->user));

        $this->followRedirects($response)->assertOk();
    }

    /** @test **/
    public function unauthorizedUserCannotViewUser()
    {
        $this->signIn();

        $this->get(route('admin.users.show', $this->user))
            ->assertForbidden();
    }

    /** @test **/
    public function guestCannotViewUser()
    {
        $this->get(route('admin.users.show', $this->user))
            ->assertRedirect(route('login'));
    }
}
