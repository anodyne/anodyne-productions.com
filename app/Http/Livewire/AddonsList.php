<?php

namespace App\Http\Livewire;

use App\Enums\AddonType;
use App\Enums\CompatibilityStatus;
use App\Models\Addon;
use App\Models\Product;
use App\View\Components\BaseLayout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class AddonsList extends Component
{
    use WithPagination;

    public array $filters = [
        'products' => ['1', '2'],
        'types' => [],
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
            ->published()
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
            // ->when(
            //     $this->filters['compat_status'],
            //     fn (Builder $query, array $statuses) => $query->whereIn
            // )
            // ->when(
            //     $this->filters['compat_series'],
            //     fn (Builder $query, array $statuses): Builder => $query->whereHas(
            //         'releaseSeries',
            //         fn (Builder $q) => $q->whereIn('releaseSeries.id', $statuses)
            //     )
            // )
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
        return view('livewire.addons-list')
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
    }
}
