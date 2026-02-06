<?php

use App\Livewire\DownloadNova;
use Livewire\Livewire;

it('ignores array payloads for genre and version', function () {
    Livewire::test(DownloadNova::class)
        ->set('genre', ['sga'])
        ->assertSet('genre', null)
        ->set('version', ['2.6.3'])
        ->assertSet('version', null)
        ->assertViewHas('selectedGenre', null)
        ->assertViewHas('selectedVersion', null)
        ->assertViewHas('downloadLink', null);
});

it('only accepts whitelisted genre and version values', function () {
    Livewire::test(DownloadNova::class)
        ->set('genre', 'invalid-genre')
        ->assertSet('genre', null)
        ->set('version', 'invalid-version')
        ->assertSet('version', null);
});
