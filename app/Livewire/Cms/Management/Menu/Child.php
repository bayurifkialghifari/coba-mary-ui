<?php

namespace App\Livewire\Cms\Management\Menu;

use Spatie\Permission\Exceptions\UnauthorizedException;
use App\Livewire\Forms\Cms\Management\FormMenuChild;
use App\Models\MenuChild;
use App\Models\Menu;
use App\Enums\Alert;
use App\Livewire\BaseComponent;
use Override;

class Child extends BaseComponent
{
    public FormMenuChild $form;
    public $title;

    public $searchBy = [
            [
                'label' => 'Name',
                'key' => 'name',
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

    public $menu;

    public function mount($menu = null) {
        $this->menu = Menu::find($menu);

        // Check menu exist
        if(!$this->menu) return $this->redirectRoute('cms.management.menu');

        $this->title = ucfirst($this->menu->name) . ' Menu Child';
    }

    public function render()
    {
        $model = MenuChild::where('menu_id', $this->menu->id);

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

        return view('livewire.cms.management.menu.child', compact('get'))->title($this->title);
    }

    #[Override]
    public function save() {
        try {
            // Check permission
            $permission = $this->isUpdate ? 'update.' : 'create.';

            // Check permission
            if(!auth()->user()->can($permission . $this->originRoute)) throw new UnauthorizedException(403, 'You do not have permission.');

            $this->form->menu_id = $this->menu->id;
            $this->form->save();

            $this->success(
                $this->isUpdate ? 'Data Updated' : 'Data Created',
                timeout: 2000,
            );

            // Redirect
            $this->closeModal();
        } catch (UnauthorizedException $exception) {
            $this->error(
                $exception->getMessage(),
                timeout: 2000,
            );
        }
    }
}
