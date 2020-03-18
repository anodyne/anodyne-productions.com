<?php

namespace Tests\Unit\Account;

use Tests\TestCase;
use Domain\Account\Models\User;
use Domain\Account\Actions\DeleteUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    protected $action;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->action = app(DeleteUser::class);

        $this->user = factory(User::class)->create();
    }

    /** @test **/
    public function itDeletesAUser()
    {
        $user = $this->action->execute($this->user);

        $this->assertInstanceOf(User::class, $user);
    }
}
