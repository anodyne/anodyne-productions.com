<?php

namespace Domain\Users\Livewire;

use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowUsers extends Component
{
    use WithFileUploads;
    use WithPerPagePagination;
    use WithSorting;

    public $filters = [
        'search' => '',
        'role' => ['admin', 'staff', 'user'],
        'exchange' => '',
    ];

    public $showEditSlideover = false;

    public $photo;

    public User $editing;

    protected $queryString = ['sorts'];

    protected $rules = [
        'editing.name' => ['required'],
        'editing.email' => ['required', 'email', 'unique:users,email'],
        'editing.role' => ['sometimes', 'in:admin,staff,user'],
        'editing.is_exchange_author' => ['nullable'],
    ];

    public function deleteProfilePhoto()
    {
        $this->editing->deleteProfilePhoto();
    }

    public function edit(User $user)
    {
        $this->editing = $user;

        $this->showEditSlideover = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->showEditSlideover = false;
    }

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
            ->when($this->filters['role'], fn ($query, $role) => $query->whereIn('role', $role))
            ->when($this->filters['exchange'], fn ($query, $exchange) => $query->where('is_exchange_author', filter_var($exchange, FILTER_VALIDATE_BOOLEAN)));

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
