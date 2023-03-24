<?php

namespace App\Http\Livewire;

use App\Models\Addon;
use App\Models\Download;
use App\Models\ReleaseSeries;
use App\Models\Version;
use App\View\Components\BaseLayout;
use Illuminate\Support\Collection;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AddonsDisplay extends Component
{
    public Addon $addon;

    public ?Version $version = null;

    public function download(): BinaryFileResponse
    {
        Download::create([
            'addon_id' => $this->addon->id,
            'version_id' => $this->version->id,
            'user_id' => auth()->id(),
        ]);

        $media = $this->version->getFirstMedia('downloads');

        return response()->download(
            $media->getPath(),
            sprintf(
                '%s-%s.%s',
                $this->addon->slug,
                $this->version->version,
                $media->extension
            )
        );
    }

    public function getQuestionsProperty(): Collection
    {
        return $this->addon->questions()->published()->get();
    }

    public function getReleaseSeriesProperty(): Collection
    {
        return ReleaseSeries::ordered()->get();
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
        ];
    }

    public function mount(): void
    {
        $this->version = $this->addon->latestVersion;
    }

    public function render()
    {
        return view('livewire.addons-display')
            ->layout(BaseLayout::class, [
                'attributes' => [
                    'class' => 'bg-white dark:bg-slate-900',
                ],
                'title' => $this->addon->name.' - Nova Add-ons by Anodyne',
                'hasAppearanceModes' => true,
            ]);
    }
}
