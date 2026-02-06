<?php

namespace App\Livewire;

use App\Models\Release;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;

class DownloadNova extends Component
{
    /** @var string|null */
    public $genre = null;

    /** @var string|null */
    public $version = null;

    #[Computed]
    public function downloadLink(): ?string
    {
        $version = data_get($this->selectedVersion, 'value');
        $genre = data_get($this->selectedGenre, 'value');

        if (! is_string($version) || ! is_string($genre)) {
            return null;
        }

        $filename = sprintf(
            'nova-%s-%s.zip',
            $version,
            $genre
        );

        /** @var $disk Filesystem */
        $disk = Storage::disk('r2-nova2-downloads');

        return $disk->temporaryUrl($filename, now()->addMinutes(5));
    }

    #[Computed]
    public function allGenres(): Collection
    {
        return collect([
            ['id' => 1, 'value' => 'sga', 'name' => 'Atlantis', 'content' => 'Stargate'],
            ['id' => 2, 'value' => 'bl5', 'name' => 'Babylon 5'],
            ['id' => 3, 'value' => 'baj', 'name' => 'Bajorans', 'content' => 'Star Trek'],
            ['id' => 4, 'value' => 'bsg', 'name' => 'Battlestar Galactica'],
            ['id' => 5, 'value' => 'blank', 'name' => 'Blank'],
            ['id' => 6, 'value' => 'crd', 'name' => 'Cardassians', 'content' => 'Star Trek'],
            ['id' => 7, 'value' => 'ds9', 'name' => 'Deep Space 9', 'content' => 'Star Trek'],
            ['id' => 8, 'value' => 'dnd', 'name' => 'Dungeons & Dragons'],
            ['id' => 9, 'value' => 'ent', 'name' => 'Enterprise era', 'content' => 'Star Trek'],
            ['id' => 10, 'value' => 'kli', 'name' => 'Klingons', 'content' => 'Star Trek'],
            ['id' => 11, 'value' => 'mov', 'name' => 'Movie era', 'content' => 'Star Trek'],
            ['id' => 12, 'value' => 'rom', 'name' => 'Romulans', 'content' => 'Star Trek'],
            ['id' => 13, 'value' => 'dsv', 'name' => 'seaQuest DSV'],
            ['id' => 14, 'value' => 'sg1', 'name' => 'SG-1', 'content' => 'Stargate'],
            ['id' => 15, 'value' => 'sto', 'name' => 'Star Trek: Online', 'content' => 'Star Trek'],
            ['id' => 16, 'value' => 'tos', 'name' => 'The Original Series era', 'content' => 'Star Trek'],
        ]);
    }

    #[Computed]
    public function selectedGenre(): ?array
    {
        if (blank($this->genre)) {
            return null;
        }

        return $this->allGenres->where('value', $this->genre)->first();
    }

    #[Computed]
    public function allVersions(): Collection
    {
        return collect([
            ['id' => 1, 'name' => $this->latestVersion?->version, 'value' => $this->latestVersion?->version, 'content' => 'Latest version'],
            ['id' => 2, 'name' => '2.6.3', 'value' => '2.6.3', 'content' => 'Legacy version for PHP 5.6'],
            ['id' => 3, 'name' => '2.3.2', 'value' => '2.3.2', 'content' => 'Legacy version for PHP 5.2'],
        ]);
    }

    #[Computed]
    public function selectedVersion(): ?array
    {
        if (blank($this->version)) {
            return null;
        }

        return $this->allVersions->where('value', $this->version)->first();
    }

    #[Computed]
    public function latestVersion(): ?Release
    {
        return Release::query()
            ->where('published', true)
            ->latest('date')
            ->first();
    }

    public function mount(): void
    {
        $this->version = $this->allVersions[0]['value'];
        $this->sanitizeSelections();
    }

    public function hydrate(): void
    {
        $this->sanitizeSelections();
    }

    public function updatedGenre(mixed $genre): void
    {
        $this->genre = $this->sanitizeGenre($genre);
    }

    public function updatedVersion(mixed $version): void
    {
        $this->version = $this->sanitizeVersion($version);
    }

    private function sanitizeSelections(): void
    {
        $this->genre = $this->sanitizeGenre($this->genre);
        $this->version = $this->sanitizeVersion($this->version);
    }

    private function sanitizeGenre(mixed $genre): ?string
    {
        if (! is_string($genre) || blank($genre)) {
            return null;
        }

        return $this->allGenres->contains(
            fn (array $candidate): bool => data_get($candidate, 'value') === $genre
        ) ? $genre : null;
    }

    private function sanitizeVersion(mixed $version): ?string
    {
        if (! is_string($version) || blank($version)) {
            return null;
        }

        return $this->allVersions->contains(
            fn (array $candidate): bool => data_get($candidate, 'value') === $version
        ) ? $version : null;
    }

    public function render()
    {
        $selectedGenre = $this->selectedGenre;
        $selectedVersion = $this->selectedVersion;

        return view('livewire.download-nova', [
            'allGenres' => $this->allGenres,
            'selectedGenre' => $selectedGenre,
            'allVersions' => $this->allVersions,
            'selectedVersion' => $selectedVersion,
            'downloadLink' => filled($selectedGenre) && filled($selectedVersion) ? $this->downloadLink : null,
        ]);
    }
}
