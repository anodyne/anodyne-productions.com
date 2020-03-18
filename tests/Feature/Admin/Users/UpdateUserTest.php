<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use Domain\Account\Models\User;
use App\Account\Requests\UpdateAccountInfoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
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
    public function authorizedUserCanViewEditUserPage()
    {
        $this->signInWithPermission('user.update');

        $this->get(route('admin.users.edit', $this->user))->assertOk();
    }

    /** @test **/
    public function authorizedUserCanUpdateUser()
    {
        $this->signInWithPermission('user.update');

        $data = [
            'name' => 'John Public',
            'username' => 'jpublic',
            'email' => 'john.public@example.com',
        ];

        $response = $this->putJson(
            route('admin.users.update', $this->user),
            $data
        );

        $this->followRedirects($response)->assertOk();

        $this->assertDatabaseHas('users', $data);
    }

    /** @test **/
    public function unauthorizedUserCannotUpdateUser()
    {
        $this->signIn();

        $this->get(route('admin.users.edit', $this->user))
            ->assertForbidden();

        $this->putJson(route('admin.users.update', $this->user), [])
            ->assertForbidden();
    }

    /** @test **/
    public function guestCannotUpdateUser()
    {
        $this->get(route('admin.users.edit', $this->user))
            ->assertRedirect(route('login'));

        $this->put(route('admin.users.update', $this->user), [])
            ->assertRedirect(route('login'));
    }

    /** @test **/
    public function userStoreUsesFormRequestValidation()
    {
        $this->assertRouteUsesFormRequest(
            'admin.users.update',
            UpdateAccountInfoRequest::class
        );
    }

    /** @test **/
    public function cannotUpdateUserWithAnExistingEmailAddress()
    {
        $john = $this->createUser();

        $user = $this->signInWithPermission('user.update');

        $response = $this->putJson(route('admin.users.update', $this->user), [
            'name' => $user->name,
            'username' => $user->username,
            'email' => $john->email,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');

        $this->assertDatabaseMissing('users', [
            'name' => $user->name,
            'username' => $user->username,
            'email' => $john->email,
        ]);
    }

    /** @test **/
    public function cannotUpdateUserWithExistingUsername()
    {
        $john = $this->createUser();

        $user = $this->signInWithPermission('user.update');

        $response = $this->putJson(route('admin.users.update', $this->user), [
            'name' => $user->name,
            'username' => $john->username,
            'email' => $user->email,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('username');

        $this->assertDatabaseMissing('users', [
            'name' => $user->name,
            'username' => $john->username,
            'email' => $user->email,
        ]);
    }

    /** @test **/
    public function cannotUpdateUserWithIllegalCharactersInTheUsername()
    {
        $user = $this->signInWithPermission('user.update');

        $usernames = [
            'some username',
            'some"username',
            "some'username",
        ];

        collect($usernames)->each(function ($username) use ($user) {
            $response = $this->putJson(route('admin.users.update', $this->user), [
                'name' => $user->name,
                'username' => $username,
                'email' => $user->email,
            ]);

            $response->assertStatus(422);
            $response->assertJsonValidationErrors('username');

            $this->assertDatabaseMissing('users', [
                'name' => $user->name,
                'username' => $username,
                'email' => $user->email,
            ]);
        });
    }
}
