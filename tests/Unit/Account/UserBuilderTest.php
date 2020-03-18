<?php

namespace Tests\Unit\Account;

use Tests\TestCase;
use Domain\Account\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserBuilderTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function itOnlyPullsDeletedUsersForForceDeletionThatWereDeletedThirtyDaysAgo()
    {
        $james = factory(User::class)->create([
            'name' => 'James',
            'deleted_at' => now()->subDays(31),
        ]);

        $daryl = factory(User::class)->create([
            'name' => 'Daryl',
            'deleted_at' => now()->subDays(10),
        ]);

        $usersToDelete = User::whereReadyForDeletion()->get();

        $this->assertCount(1, $usersToDelete);
        $this->assertTrue($usersToDelete->first()->is($james));
        $this->assertFalse($usersToDelete->first()->is($daryl));
    }
}
