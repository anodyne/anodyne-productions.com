<?php

namespace Tests\Unit\Console;

use Tests\TestCase;
use Domain\Account\Models\User;
use Domain\Account\Actions\ForceDeleteUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUsersCommandTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->action = app(ForceDeleteUser::class);

        $this->user = factory(User::class)->create([
            'deleted_at' => now()->subDays(31),
        ]);
    }

    /** @test **/
    public function itForceDeletesUser()
    {
        $this->artisan('anodyne:delete-users');

        $this->assertDatabaseMissing('users', [
            'name' => $this->user->name,
            'email' => $this->user->email,
        ]);
    }

    /** @test **/
    public function itRemovesActivityCausedByTheUser()
    {
        $this->artisan('anodyne:delete-users');

        $this->assertDatabaseMissing('activity_log', [
            'causer_id' => $this->user->id,
        ]);

        $this->assertDatabaseMissing('activity_log', [
            'subject_id' => $this->user->id,
        ]);
    }
}
