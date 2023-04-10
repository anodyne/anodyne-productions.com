<?php

namespace App\Http\Livewire;

use App\Models\Release;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DownloadNova extends Component
{
    public $selectedGenre;

    public $selectedVersion;

    public $versions;

    public $genres;

    public function downloadLink(): string
    {
        $filename = sprintf(
            'nova-%s-%s.zip',
            $this->selectedVersion,
            $this->selectedGenre
        );

        return Storage::disk('r2-nova2-downloads')->temporaryUrl($filename, now()->addMinutes(5));
    }

    public function getSelectedGenre(?string $key = null): mixed
    {
        if (blank($this->selectedGenre)) {
            return null;
        }

        $selected = $this->genres->where('value', $this->selectedGenre)->first();

        if ($key) {
            return $selected[$key];
        }

        return $selected;
    }

    public function getSelectedVersion(?string $key = null): mixed
    {
        $selected = $this->versions->where('value', $this->selectedVersion)->first();

        if ($key) {
            return $selected[$key];
        }

        return $selected;
    }

    public function mount(): void
    {
        $release = Release::query()
            ->where('published', true)
            ->latest('date')
            ->first();

        $this->versions = collect([
            ['id' => 1, 'name' => $release->version, 'value' => $release->version, 'content' => 'Latest version'],
            ['id' => 2, 'name' => '2.6.2', 'value' => '2.6.2', 'content' => 'Legacy version for PHP 5.6'],
            ['id' => 3, 'name' => '2.3.2', 'value' => '2.3.2', 'content' => 'Legacy version for PHP 5.2'],
        ]);

        $this->genres = collect([
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

        $this->selectedVersion = $this->versions[0]['value'];
    }

    public function render()
    {
        return view('livewire.download-nova');
    }
}
