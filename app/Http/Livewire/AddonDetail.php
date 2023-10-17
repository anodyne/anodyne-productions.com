<?php

namespace App\Http\Livewire;

use App\Models\Addon;
use App\Models\Download;
use App\Models\ReleaseSeries;
use App\Models\Review;
use App\Models\Version;
use App\View\Components\BaseLayout;
use Exception;
use Illuminate\Support\Collection;
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

            return response()->download(
                $media->getTemporaryUrl(now()->addMinutes(5)),
                $media->name.'.zip'
            );

            // return $media;
        }

        throw new Exception('No download media associated with the add-on');
    }

    public function getQuestionsProperty(): Collection
    {
        return $this->addon->questions()->published()->get();
    }

    public function getReleaseSeriesProperty(): Collection
    {
        $query = ($this->version->releaseSeries()->count() > 0)
            ? $this->version->releaseSeries()
            : ReleaseSeries::query();

        return $query->where('include_in_compatibility', true)
            ->ordered()
            ->get();
    }

    public function getReviewStatsProperty()
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

    public function getVersionsProperty(): Collection
    {
        return $this->addon->versions()->published()->get();
    }

    public function setVersion($versionId): void
    {
        $this->version = Version::find($versionId);

        $this->dispatchBrowserEvent('toggle-dropdown');
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
        $this->addon->loadMissing('reviews');

        $this->version = $this->addon->latestVersion;
    }

    public function render()
    {
        return view('livewire.addon-detail')
            ->layout(BaseLayout::class, [
                'attributes' => [
                    'class' => 'bg-white dark:bg-slate-900',
                ],
                'title' => $this->addon->name.' - Nova Add-ons by Anodyne',
                'hasAppearanceModes' => true,
            ]);
    }
}
