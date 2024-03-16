<?php

namespace App\Livewire;

use App\Models\Addon;
use App\Models\Review;
use Filament\Notifications\Notification;
use WireElements\Pro\Components\Modal\Modal;

class AddonReview extends Modal
{
    public ?Addon $addon = null;

    public ?Review $review = null;

    protected $rules = [
        'review.rating' => 'required',
        'review.content' => 'nullable',
    ];

    public function save(): void
    {
        $this->review->fill([
            'addon_id' => $this->addon->id,
            'user_id' => auth()->id(),
        ]);
        $this->review->save();

        $this->addon->update([
            'rating' => $this->addon->reviews()->avg('rating'),
        ]);

        $this->close();

        $this->close(
            andEmit: [
                AddonsDisplay::class => 'reviewSaved',
            ]
        );

        Notification::make()
            ->title('Review saved')
            ->success()
            ->send();
    }

    public function mount(int $addonId): void
    {
        $this->addon = Addon::findOrFail($addonId);
        $this->review = Review::query()->addon($this->addon->id)->user(auth()->id())->firstOrNew();
    }

    public function render()
    {
        return view('livewire.addon-review');
    }
}
