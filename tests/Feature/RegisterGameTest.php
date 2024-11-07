<?php

use App\Models\Game;
use App\Models\Release;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertNotNull;

beforeEach(function () {
    $this->release = Release::factory()->create(['version' => '2.7.12']);
});

it('can register a game', function () {
    $data = [
        'name' => 'USS Nova',
        'version' => $this->release->version,
        'active_users' => 5,
        'active_primary_characters' => 10,
        'active_secondary_characters' => 15,
        'active_support_characters' => 30,
        'total_stories' => 10,
        'total_posts' => 1_000,
        'total_post_words' => 500_000,
        'url' => 'https://ussnova.com',
        'genre' => 'ds9',
        'php_version' => '8.3.0',
        'db_driver' => 'mysqli',
        'db_version' => '8.0.36',
        'server_software' => 'Nginx',
    ];

    $response = post(route('api.register-game'), $data);
    $response->assertOk();

    assertDatabaseHas(Game::class, [
        'name' => 'USS Nova',
        'url' => 'https://ussnova.com',
        'genre' => 'ds9',
        'release_id' => $this->release->id,
        'php_version' => '8.3.0',
        'db_driver' => 'mysqli',
        'db_version' => '8.0.36',
        'server_software' => 'Nginx',
    ]);

    assertNotNull($response->json('game_id'));
});

it('can update an existing game registration with url only', function () {
    $oldRelease = Release::factory()->create(['version' => '2.7.11']);

    $game = Game::factory()->create([
        'url' => 'https://ussnova.com/',
        'release_id' => $oldRelease->id,
    ]);

    $data = [
        'name' => 'Updated game name',
        'version' => '2.7.12',
        'active_users' => 5,
        'active_primary_characters' => 10,
        'active_secondary_characters' => 15,
        'active_support_characters' => 30,
        'total_stories' => 10,
        'total_posts' => 1_000,
        'total_post_words' => 500_000,
        'url' => $game->url,
        'genre' => $game->genre->value,
        'php_version' => $game->php_version,
        'db_driver' => $game->db_driver,
        'db_version' => $game->db_version,
        'server_software' => $game->server_software,
    ];

    $response = post(route('api.register-game'), $data);
    $response->assertOk();

    assertDatabaseHas(Game::class, [
        'id' => $game->id,
        'name' => 'Updated game name',
        'url' => $game->url,
        'genre' => $game->genre->value,
        'release_id' => $this->release->id,
        'php_version' => $game->php_version,
        'db_driver' => $game->db_driver,
        'db_version' => $game->db_version,
        'server_software' => $game->server_software,
    ]);

    assertEquals($response->json('game_id'), $game->prefixed_id);
});

it('can update an existing game registration with unique game ID', function () {
    $oldRelease = Release::factory()->create(['version' => '2.7.11']);

    $game = Game::factory()->create([
        'url' => 'https://ussnova.com/',
        'release_id' => $oldRelease->id,
    ]);

    $data = [
        'name' => 'Updated game name',
        'version' => '2.7.12',
        'active_users' => 5,
        'active_primary_characters' => 10,
        'active_secondary_characters' => 15,
        'active_support_characters' => 30,
        'total_stories' => 10,
        'total_posts' => 1_000,
        'total_post_words' => 500_000,
        'url' => $game->url,
        'genre' => $game->genre->value,
        'php_version' => $game->php_version,
        'db_driver' => $game->db_driver,
        'db_version' => $game->db_version,
        'server_software' => $game->server_software,
        'game_id' => $game->prefixed_id,
    ];

    $response = post(route('api.register-game'), $data);
    $response->assertOk();

    assertDatabaseHas(Game::class, [
        'id' => $game->id,
        'name' => 'Updated game name',
        'url' => $game->url,
        'genre' => $game->genre->value,
        'release_id' => $this->release->id,
        'php_version' => $game->php_version,
        'db_driver' => $game->db_driver,
        'db_version' => $game->db_version,
        'server_software' => $game->server_software,
    ]);

    assertEquals($response->json('game_id'), $game->prefixed_id);
});

it('sets the install date to now for a fresh install', function () {
    $data = [
        'name' => 'USS Nova',
        'version' => $this->release->version,
        'active_users' => 1,
        'active_primary_characters' => 1,
        'active_secondary_characters' => 0,
        'active_support_characters' => 0,
        'total_stories' => 0,
        'total_posts' => 0,
        'total_post_words' => 0,
        'url' => 'https://ussnova.com',
        'genre' => 'ds9',
        'php_version' => '8.3.0',
        'db_driver' => 'mysqli',
        'db_version' => '8.0.36',
        'server_software' => 'Nginx',
        'install_date' => null,
    ];

    $response = post(route('api.register-game'), $data);
    $response->assertOk();
    $date = now();

    $game = Game::latest()->first();

    assertNotNull($game->nova_installed_at);
    assertEquals($game->nova_installed_at->toIso8601String(), $game->nova_updated_at->toIso8601String());
    assertEquals($game->nova_installed_at->toIso8601String(), $date->toIso8601String());
});

it('sets the install date to the game install date for an update', function () {
    $installed = now()->subDay();

    $data = [
        'name' => 'USS Nova',
        'version' => $this->release->version,
        'active_users' => 1,
        'active_primary_characters' => 1,
        'active_secondary_characters' => 0,
        'active_support_characters' => 0,
        'total_stories' => 0,
        'total_posts' => 0,
        'total_post_words' => 0,
        'url' => 'https://ussnova.com',
        'genre' => 'ds9',
        'php_version' => '8.3.0',
        'db_driver' => 'mysqli',
        'db_version' => '8.0.36',
        'server_software' => 'Nginx',
        'install_date' => $installed->unix(),
    ];

    $response = post(route('api.register-game'), $data);
    $response->assertOk();
    $date = now();

    $game = Game::latest()->first();

    assertNotNull($game->nova_installed_at);
    assertNotEquals($game->nova_installed_at->toIso8601String(), $game->nova_updated_at->toIso8601String());
    assertEquals($game->nova_installed_at->toIso8601String(), now()->subDay()->toIso8601String());
    assertNotEquals($game->nova_installed_at->toIso8601String(), $date->toIso8601String());
});

describe('update registration with different urls', function () {
    it('can change from http to https', function () {
        $oldRelease = Release::factory()->create(['version' => '2.7.11']);

        $game = Game::factory()->create([
            'url' => 'http://ussnova.com/',
            'release_id' => $oldRelease->id,
        ]);

        $data = [
            'name' => 'Updated game name',
            'version' => '2.7.12',
            'active_users' => 5,
            'active_primary_characters' => 10,
            'active_secondary_characters' => 15,
            'active_support_characters' => 30,
            'total_stories' => 10,
            'total_posts' => 1_000,
            'total_post_words' => 500_000,
            'url' => 'https://ussnova.com/',
            'genre' => $game->genre->value,
            'php_version' => $game->php_version,
            'db_driver' => $game->db_driver,
            'db_version' => $game->db_version,
            'server_software' => $game->server_software,
        ];

        $response = post(route('api.register-game'), $data);
        $response->assertOk();

        assertDatabaseHas(Game::class, [
            'id' => $game->id,
            'name' => 'Updated game name',
            'url' => 'https://ussnova.com/',
            'genre' => $game->genre->value,
            'release_id' => $this->release->id,
            'php_version' => $game->php_version,
            'db_driver' => $game->db_driver,
            'db_version' => $game->db_version,
            'server_software' => $game->server_software,
        ]);

        assertEquals($response->json('game_id'), $game->prefixed_id);
    });

    it('can drop www from the url', function () {
        $oldRelease = Release::factory()->create(['version' => '2.7.11']);

        $game = Game::factory()->create([
            'url' => 'https://www.ussnova.com/',
            'release_id' => $oldRelease->id,
        ]);

        $data = [
            'name' => 'Updated game name',
            'version' => '2.7.12',
            'active_users' => 5,
            'active_primary_characters' => 10,
            'active_secondary_characters' => 15,
            'active_support_characters' => 30,
            'total_stories' => 10,
            'total_posts' => 1_000,
            'total_post_words' => 500_000,
            'url' => 'https://ussnova.com/',
            'genre' => $game->genre->value,
            'php_version' => $game->php_version,
            'db_driver' => $game->db_driver,
            'db_version' => $game->db_version,
            'server_software' => $game->server_software,
        ];

        $response = post(route('api.register-game'), $data);
        $response->assertOk();

        assertDatabaseHas(Game::class, [
            'id' => $game->id,
            'name' => 'Updated game name',
            'url' => 'https://ussnova.com/',
            'genre' => $game->genre->value,
            'release_id' => $this->release->id,
            'php_version' => $game->php_version,
            'db_driver' => $game->db_driver,
            'db_version' => $game->db_version,
            'server_software' => $game->server_software,
        ]);

        assertEquals($response->json('game_id'), $game->prefixed_id);
    });
});
