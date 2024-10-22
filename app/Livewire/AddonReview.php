<?php

namespace App\Livewire;

use App\Models\Addon;
use App\Models\Review;
use Filament\Notifications\Notification;
use Livewire\Attributes\Validate;
use WireElements\Pro\Components\Modal\Modal;

class AddonReview extends Modal
{
    public ?Addon $addon = null;

    #[Validate('required|min:1|max:5')]
    public int $rating = 0;

    #[Validate('nullable')]
    public ?string $content = null;

    public ?Review $review = null;

    public function save(): void
    {
        $this->review->fill([
            'addon_id' => $this->addon->id,
            'user_id' => auth()->id(),
            'rating' => $this->rating,
            'content' => $this->content,
        ]);
        $this->review->save();

        $this->addon->update([
            'rating' => $this->addon->reviews()->avg('rating'),
        ]);

        $this->close(
            andEmit: [
                AddonDetail::class => 'reviewSaved',
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
        $this->rating = $this->review->rating ?? 0;
        $this->content = $this->review->content;
    }

    public function render()
    {
        return view('livewire.addon-review');
    }
}
