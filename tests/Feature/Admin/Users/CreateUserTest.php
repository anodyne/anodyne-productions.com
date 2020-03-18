<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use Domain\Account\Models\User;
use App\Admin\Requests\StoreUserRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function authorizedUserCanViewCreateUserPage()
    {
        $this->signInWithPermission('user.create');

        $this->get(route('admin.users.create'))->assertOk();
    }

    /** @test **/
    public function authorizedUserCanCreateUser()
    {
        $this->signInWithPermission('user.create');

        $data = [
            'name' => 'John Public',
            'username' => 'jpublic',
            'email' => 'john.public@example.com',
        ];

        $response = $this->postJson(route('admin.users.store'), $data);

        $this->followRedirects($response)->assertOk();

        $this->assertDatabaseHas('users', $data);
    }

    /** @test **/
    public function unauthorizedUserCannotCreateUser()
    {
        $this->signIn();

        $this->get(route('admin.users.create'))->assertForbidden();

        $this->postJson(route('admin.users.store'), [])->assertForbidden();
    }

    /** @test **/
    public function guestCannotCreateUser()
    {
        $this->get(route('admin.users.create'))->assertRedirect(route('login'));

        $this->post(route('admin.users.store'), [])->assertRedirect(route('login'));
    }

    /** @test **/
    public function userStoreUsesFormRequestValidation()
    {
        $this->assertRouteUsesFormRequest(
            'admin.users.store',
            StoreUserRequest::class
        );
    }

    /** @test **/
    public function cannotCreateUserWithAnExistingEmailAddress()
    {
        $john = factory(User::class)->create();

        $user = $this->signInWithPermission('user.create');

        $response = $this->postJson(route('admin.users.store'), [
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
    public function cannotCreateUserWithExistingUsername()
    {
        $john = factory(User::class)->create();

        $user = $this->signInWithPermission('user.create');

        $response = $this->postJson(route('admin.users.store'), [
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
    public function cannotCreateUserWithIllegalCharactersInTheUsername()
    {
        $user = $this->signInWithPermission('user.create');

        $usernames = [
            'some username',
            'some"username',
            "some'username",
        ];

        collect($usernames)->each(function ($username) use ($user) {
            $response = $this->postJson(route('admin.users.store'), [
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
