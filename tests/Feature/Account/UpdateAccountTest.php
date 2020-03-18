<?php

namespace Tests\Feature\Account;

use Tests\TestCase;
use Domain\Account\Models\User;
use App\Account\Requests\UpdateAccountInfoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateAccountTest extends TestCase
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
    public function currentUserCanUpdateTheirAccount()
    {
        $this->signIn($this->user);

        $response = $this->putJson(route('account.info.update'), [
            'name' => $this->user->name,
            'username' => $this->user->username,
            'email' => $this->user->email,
        ]);

        $this->followRedirects($response)->assertOk();

        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'username' => $this->user->username,
            'email' => $this->user->email,
        ]);
    }

    /** @test **/
    public function accountUpdateUsesFormRequestValidation()
    {
        $this->assertRouteUsesFormRequest(
            'account.info.update',
            UpdateAccountInfoRequest::class
        );
    }

    /** @test **/
    public function cannotUpdateEmailAddressToAnExistingEmailAddress()
    {
        $john = $this->createUser();

        $this->signIn($this->user);

        $response = $this->putJson(route('account.info.update'), [
            'name' => $this->user->name,
            'username' => $this->user->username,
            'email' => $john->email,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');

        $this->assertDatabaseMissing('users', [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'username' => $this->user->username,
            'email' => $john->email,
        ]);
    }

    /** @test **/
    public function cannotUpdateUsernameToAnExistingUsername()
    {
        $john = $this->createUser();

        $this->signIn($this->user);

        $response = $this->putJson(route('account.info.update'), [
            'name' => $this->user->name,
            'username' => $john->username,
            'email' => $this->user->email,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('username');

        $this->assertDatabaseMissing('users', [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'username' => $john->username,
            'email' => $this->user->email,
        ]);
    }

    /** @test **/
    public function cannotUpdateUsernameWithIllegalCharacters()
    {
        $this->signIn($this->user);

        $usernames = [
            'some username',
            'some"username',
            "some'username",
        ];

        collect($usernames)->each(function ($username) {
            $response = $this->putJson(route('account.info.update'), [
                'name' => $this->user->name,
                'username' => $username,
                'email' => $this->user->email,
            ]);

            $response->assertStatus(422);
            $response->assertJsonValidationErrors('username');

            $this->assertDatabaseMissing('users', [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'username' => $username,
                'email' => $this->user->email,
            ]);
        });
    }
}
