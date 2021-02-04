<?php

namespace Domain\Users\Livewire;

use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    use WithPerPagePagination;
    use WithSorting;

    public $filters = [
        'search' => '',
        'role' => '',
        'exchange' => true,
    ];

    protected $queryString = ['sorts'];

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function getRowsQueryProperty()
    {
        $query = User::query()
            ->when($this->filters['search'], fn ($query, $search) => $query->where('name', 'like', "%{$search}%"))
            ->when($this->filters['role'], fn ($query, $role) => $query->where('role', '=', $role))
            ->when($this->filters['exchange'], fn ($query, $exchange) => $query->where('is_exchange_author', '=', $exchange));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        return view('livewire.users.show-users', [
            'users' => $this->rows,
        ]);
    }
}
