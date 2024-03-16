<?php

namespace App\Livewire;

use App\Enums\AddonType;
use App\Enums\CompatibilityStatus;
use App\Models\Addon;
use App\Models\Product;
use App\Models\User;
use App\View\Components\BaseLayout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class AddonList extends Component
{
    use WithPagination;

    public ?User $user = null;

    public array $filters = [
        'products' => ['2'],
        'types' => [],
        'rating' => '',
        'search' => '',
        'compat_series' => [],
        'compat_status' => [],
    ];

    public function resetFilters(): void
    {
        $this->setFilterDefaults();
    }

    public function getAddonsProperty()
    {
        return Addon::query()
            ->with('user', 'products')
            ->withCount('reviews')
            ->published()
            ->when(
                $this->user,
                fn (Builder $query, User $user) => $query->where('user_id', $user->id)
            )
            ->when(
                $this->filters['types'],
                fn (Builder $query, array $values): Builder => $query->whereIn('type', $values)
            )
            ->when(
                $this->filters['products'],
                fn (Builder $query, array $products): Builder => $query->whereHas(
                    'products',
                    fn (Builder $q) => $q->whereIn('products.id', $products)
                )
            )
            ->when(
                $this->filters['search'],
                fn (Builder $query, string $search) => $query->where('name', 'like', "%{$search}%")
            )
            ->when(
                $this->filters['rating'],
                fn (Builder $query, string $rating) => $query->where('rating', '>=', $rating)
            )
            ->latest('updated_at')
            ->paginate(15);
    }

    public function getProductsProperty(): Collection
    {
        return Product::query()
            ->published()
            ->orderByDesc('id')
            ->get()
            ->pluck('name', 'id');
    }

    public function mount(): void
    {
        $this->setFilterDefaults();
    }

    public function render()
    {
        return view('livewire.addon-list')
            ->layout(BaseLayout::class, [
                'attributes' => [
                    'class' => 'bg-white dark:bg-slate-900',
                ],
                'title' => 'Nova Add-ons by Anodyne',
                'hasAppearanceModes' => true,
            ]);
    }

    protected function setFilterDefaults(): void
    {
        $this->filters['compat_status'] = [
            CompatibilityStatus::compatible->value => CompatibilityStatus::compatible->getLabel(),
            CompatibilityStatus::incompatible->value => CompatibilityStatus::incompatible->getLabel(),
            CompatibilityStatus::unknown->value => CompatibilityStatus::unknown->getLabel(),
        ];

        $this->filters['products'] = ['2'];

        $this->filters['types'] = collect(AddonType::cases())
            ->flatMap(fn ($type) => [$type->value])
            ->all();

        $this->filters['rating'] = '';
    }
}
