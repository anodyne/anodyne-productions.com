<?php

namespace Domain\Exchange\Livewire;

use Domain\Exchange\Models\Addon;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAddons extends Component
{
    use WithPagination;

    public $filters = [
        'search' => '',
        'type' => ['theme', 'extension', 'rank', 'genre'],
        'rating' => 0,
        'min-version' => '',
        'max-version' => '',
    ];

    public $sortDirection = 'desc';

    public $sortField = 'created_at';

    public function setSortField($value)
    {
        $this->sortField = $value;

        $this->dispatchBrowserEvent('dropdown-close');
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.exchange.show-addons', [
            'addons' => Addon::query()
                ->with('user')
                ->when($this->filters['search'], fn ($query, $search) => $query->where('name', 'like', "%{$search}%"))
                ->when($this->filters['type'], fn ($query, $types) => $query->whereIn('type', $types))
                ->when($this->filters['rating'], fn ($query, $rating) => $query->where('rating', '>=', $rating))
                ->when($this->filters['min-version'], fn ($query, $version) => $query->where('version', '>=', $version))
                ->when($this->filters['max-version'], fn ($query, $version) => $query->where('version', '<=', $version))
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(9),
        ])->layout('layouts.exchange');
    }
}
