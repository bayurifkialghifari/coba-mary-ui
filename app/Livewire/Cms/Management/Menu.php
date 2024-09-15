<?php

namespace App\Livewire\Cms\Management;

use App\Livewire\Forms\Cms\Management\FormMenu;
use Livewire\Attributes\Url;
use App\Models\Menu as MenuModel;
use App\Livewire\BaseComponent;

class Menu extends BaseComponent
{
    public FormMenu $form;
    public $title = 'Management Menu';

    #[Url(keep: true)]
    public $on = 'cms';

    public $searchBy = [
            [
                'label' => 'Name',
                'key' => 'name',
            ],
            [
                'label' => 'On',
                'key' => 'on',
            ],
            [
                'label' => 'Type',
                'key' => 'type',
            ],
            [
                'label' => 'Icon',
                'key' => 'icon',
            ],
            [
                'label' => 'Route',
                'key' => 'route',
            ],
            [
                'label' => 'Ordering',
                'key' => 'ordering',
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
        $model = MenuModel::where('on', $this->on);

        $get = $this->getDataWithFilter(
            model: $model,
            searchBy: $this->searchBy,
            sortBy: $this->sortBy,
            paginate: $this->paginate,
            s: $this->search
        );

        if ($this->search != null) {
            $this->resetPage();
        }

        return view('livewire.cms.management.menu', compact('get'))->title($this->title);
    }
}
