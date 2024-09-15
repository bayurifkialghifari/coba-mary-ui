<?php

namespace App\Livewire\Cms\Management;

use App\Livewire\Forms\Cms\Management\FormRole;
use App\Models\Role as RoleModel;
use App\Livewire\BaseComponent;

class Role extends BaseComponent
{
    public FormRole $form;
    public $title = 'Management Role';

    public $searchBy = [
            [
                'label' => 'Name',
                'key' => 'name',
            ],
        ],
        $search = '',
        $paginate = 10,
        $selected = [],
        $sortBy = [
            'column' => 'name',
            'direction' => 'desc',
        ];

    public function render()
    {
        $get = $this->getDataWithFilter(
            model: new RoleModel,
            searchBy: $this->searchBy,
            sortBy: $this->sortBy,
            paginate: $this->paginate,
            s: $this->search
        );

        if ($this->search != null) {
            $this->resetPage();
        }

        return view('livewire.cms.management.role', compact('get'))->title($this->title);
    }
}
