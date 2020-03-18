<?php

namespace Tests\Feature\Account;

use Tests\TestCase;
use Domain\Account\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var  User
     */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test **/
    public function visitorsCanViewAUserProfilePage()
    {
        $this->get(route('profile.show', $this->user->username))
            ->assertOk();
    }

    /** @test **/
    public function protectedInfoIsNotAvailable()
    {
        $response = $this->get(route('profile.show', $this->user->username));

        $response->assertViewMissing('user.email');
        $response->assertViewMissing('user.name');
        $response->assertViewMissing('user.can');
    }
}
