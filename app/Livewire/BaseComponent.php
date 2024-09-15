<?php

namespace App\Livewire;

use App\Traits\WithGetFilterData;
use App\Traits\WithResetAction;
use App\Traits\WithCreateAction;
use App\Traits\WithDeleteAction;
use App\Traits\WithEditAction;
use App\Traits\WithSaveAction;
use App\Traits\InteractWithModal;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;

class BaseComponent extends Component {
    use WithPagination,
        WithFileUploads,
        WithGetFilterData,
        WithResetAction,
        WithCreateAction,
        WithEditAction,
        WithDeleteAction,
        WithSaveAction,
        InteractWithModal,
        Toast;

    public $originRoute = '';
    public $previousUrl = '';
    public $isUpdate = false;

    // Image iterator for image set null after save
    public $imageIttr = 1;

    public function __construct()
    {
        $this->originRoute = request()->route()->getName();
        $this->previousUrl = url()->previous();
    }
}
