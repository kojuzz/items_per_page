<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Opportunities extends Component
{
    use WithPagination;
    public $perPage = 20;
    public $options = [20, 50, 100, 250];
    protected $queryString = ['perPage'];

    public $searchKey = '';
    public $customOption;
    public $sortId = 'asc';
    public $sortName = 'asc';

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function checkCustomOption()
    {
        $this->validate(['customOption' => 'required|numeric|min:1']);
        $this->perPage = $this->customOption;
    }

    public function clearAll() {
        $this->searchKey = '';
        $this->perPage = 20;
        $this->sortName = 'asc';
        $this->customOption = null;
        $this->resetPage();
    }

    public function render()
    {
        $this->sortName == 'asc' ? 'desc' : 'asc';
        $items = Item::select('name')
            ->when($this->searchKey, function ($query) {
                $query->where('name', 'like', '%' . $this->searchKey . '%');
            })
            ->orderBy('name', $this->sortName)
            ->paginate($this->perPage);
        return view('livewire.opportunities', [
            'items' => $items
        ]);
    }
}
