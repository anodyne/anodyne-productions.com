<?php

namespace App\Http\Livewire;

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
        'products' => ['1', '2'],
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
            ->paginate(15);
    }

    public function getProductsProperty(): Collection
    {
        return Product::query()
            ->published()
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
            CompatibilityStatus::compatible->value => CompatibilityStatus::compatible->displayName(),
            CompatibilityStatus::incompatible->value => CompatibilityStatus::incompatible->displayName(),
            CompatibilityStatus::unknown->value => CompatibilityStatus::unknown->displayName(),
        ];

        $this->filters['products'] = Product::query()
            ->published()
            ->get()
            ->flatMap(fn ($product) => [(string) $product->id])
            ->all();

        $this->filters['types'] = collect(AddonType::cases())
            ->flatMap(fn ($type) => [$type->value])
            ->all();

        $this->filters['rating'] = '';
    }
}