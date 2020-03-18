<?php

namespace Tests\Unit\Account;

use Tests\TestCase;
use Domain\Account\Models\User;
use Domain\Account\Actions\UpdateUser;
use Domain\Account\DataTransferObjects\UserData;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    protected $action;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->action = app(UpdateUser::class);

        $this->user = factory(User::class)->create();
    }

    /** @test **/
    public function itUpdatesAUser()
    {
        $user = $this->action->execute(
            $this->user,
            new UserData([
                'name' => $this->user->name,
                'username' => $this->user->username,
                'email' => $this->user->email,
            ])
        );

        $this->assertInstanceOf(User::class, $user);
    }
}
