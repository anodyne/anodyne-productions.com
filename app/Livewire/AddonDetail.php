<?php

namespace App\Livewire;

use App\Models\Addon;
use App\Models\Download;
use App\Models\ReleaseSeries;
use App\Models\Review;
use App\Models\Version;
use App\View\Components\BaseLayout;
use Exception;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AddonDetail extends Component
{
    public Addon $addon;

    public ?Version $version = null;

    public function download()
    {
        if ($media = $this->version->getFirstMedia('downloads')) {
            Download::create([
                'addon_id' => $this->addon->id,
                'version_id' => $this->version->id,
                'user_id' => auth()->id(),
            ]);

            return response()->streamDownload(function () use ($media) {
                echo file_get_contents($media->getTemporaryUrl(now()->addMinutes(5)));
            }, $media->name.'.zip');
        }

        throw new Exception('No download media associated with the add-on');
    }

    #[Computed]
    public function questions(): Collection
    {
        return $this->addon->questions()->published()->get();
    }

    #[Computed]
    public function releaseSeries(): Collection
    {
        if (blank($this->version)) {
            return Collection::make();
        }

        $query = ($this->version->releaseSeries()?->count() > 0)
            ? $this->version->releaseSeries()
            : ReleaseSeries::query();

        return $query->where('include_in_compatibility', true)
            ->ordered()
            ->get();
    }

    #[Computed]
    public function reviewStats()
    {
        return Review::toBase()
            ->selectRaw('count(case when rating = 1 then 1 end) as rating1')
            ->selectRaw('count(case when rating = 2 then 1 end) as rating2')
            ->selectRaw('count(case when rating = 3 then 1 end) as rating3')
            ->selectRaw('count(case when rating = 4 then 1 end) as rating4')
            ->selectRaw('count(case when rating = 5 then 1 end) as rating5')
            ->where('addon_id', $this->addon->id)
            ->first();
    }

    #[Computed]
    public function versions(): Collection
    {
        return $this->addon->versions()->published()->get();
    }

    public function setVersion($versionId): void
    {
        $this->version = Version::find($versionId);

        $this->dispatch('toggle-dropdown');
    }

    public function getListeners()
    {
        return [
            'compatibilityReportSubmitted' => '$refresh',
            'reviewSaved' => '$refresh',
        ];
    }

    public function mount(): void
    {
        abort_if(! $this->addon->published, 404);

        $this->addon->loadMissing('reviews');

        $this->version = $this->addon->latestVersion;
    }

    public function render()
    {
        return view('livewire.addon-detail', [
            'questions' => $this->questions,
            'releaseSeries' => $this->releaseSeries,
            'reviewStats' => $this->reviewStats,
            'versions' => $this->versions,
        ])
            ->layout(BaseLayout::class, [
                'attributes' => [
                    'class' => 'bg-white dark:bg-slate-900',
                ],
                'title' => $this->addon->name.' - Nova Add-ons by Anodyne',
                'hasAppearanceModes' => true,
            ]);
    }
}
