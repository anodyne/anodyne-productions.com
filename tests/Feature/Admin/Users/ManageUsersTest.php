<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function authorizedUserWithCreatePermissionCanViewManageUsersPage()
    {
        $this->signInWithPermission('user.create');

        $response = $this->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertHasProp('users.can');
        $response->assertHasProp('users.data');
        $response->assertHasProp('users.links');
        $response->assertHasProp('users.meta');
    }

    /** @test **/
    public function authorizedUserWithUpdatePermissionCanViewManageUsersPage()
    {
        $this->signInWithPermission('user.update');

        $response = $this->get(route('admin.users.index'));

        $response->assertOk();
    }

    /** @test **/
    public function authorizedUserWithDeletePermissionCanViewManageUsersPage()
    {
        $this->signInWithPermission('user.delete');

        $response = $this->get(route('admin.users.index'));

        $response->assertOk();
    }

    /** @test **/
    public function authorizedUserWithViewPermissionCanViewManageUsersPage()
    {
        $this->signInWithPermission('user.view');

        $response = $this->get(route('admin.users.index'));

        $response->assertOk();
    }

    /** @test **/
    public function unauthorizedUserCannotViewAllUsers()
    {
        $this->signIn();

        $this->get(route('admin.users.index'))->assertForbidden();
    }

    /** @test **/
    public function guestCannotViewAllUsers()
    {
        $this->get(route('admin.users.index'))
            ->assertRedirect(route('login'));
    }

    /** @test **/
    public function listOfUsersCanBeFilteredByName()
    {
        $this->signInWithPermission('user.create');

        $this->createUser([
            'name' => 'John Public',
        ]);

        $this->createUser();

        $response = $this->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertPropCount('users.data', 3);

        $response = $this->get(route('admin.users.index') . '?search=john');

        $response->assertOk();
        $response->assertPropCount('users.data', 1);
        $response->assertPropValue('users.data', function ($users) {
            $this->assertEquals('John Public', $users[0]['name']);
        });
    }

    /** @test **/
    public function listOfUsersCanBeFilteredByEmailAddress()
    {
        $this->signInWithPermission('user.create');

        $this->createUser([
            'email' => 'john@example.com',
        ]);

        $this->createUser();

        $response = $this->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertPropCount('users.data', 3);

        $response = $this->get(route('admin.users.index') . '?search=john');

        $response->assertOk();
        $response->assertPropCount('users.data', 1);
        $response->assertPropValue('users.data', function ($users) {
            $this->assertEquals('john@example.com', $users[0]['email']);
        });
    }

    /** @test **/
    public function listOfUsersCanBeFilteredByUsername()
    {
        $this->signInWithPermission('user.create');

        $this->createUser([
            'username' => 'john-public',
        ]);

        $this->createUser();

        $response = $this->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertPropCount('users.data', 3);

        $response = $this->get(route('admin.users.index') . '?search=public');

        $response->assertOk();
        $response->assertPropCount('users.data', 1);
        $response->assertPropValue('users.data', function ($users) {
            $this->assertEquals('john-public', $users[0]['username']);
        });
    }
}
