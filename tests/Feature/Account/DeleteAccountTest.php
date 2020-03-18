<?php

namespace Tests\Feature\Account;

use Tests\TestCase;
use Domain\Account\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteAccountTest extends TestCase
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
    public function currentUserCanDeleteTheirAccount()
    {
        $this->signIn($this->user);

        $response = $this->deleteJson(route('account.destroy'));

        $this->followRedirects($response)->assertOk();

        $this->assertGuest();

        $this->assertSoftDeleted('users', $this->user->only('id', 'email'));
    }

    /** @test **/
    public function anodyneAdminCannotDeleteTheirAccount()
    {
        $anodyne = $this->createUser([
            'email' => 'admin@anodyne-productions.com',
        ]);

        $this->signIn($anodyne);

        $response = $this->deleteJson(route('account.destroy'));

        $response->assertForbidden();

        $this->assertDatabaseHas('users', $anodyne->only('id', 'email'));
    }
}
