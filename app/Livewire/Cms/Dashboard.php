<?php

namespace App\Livewire\Cms;

use App\Livewire\BaseComponent;

class Dashboard extends BaseComponent
{
    public $title = 'Dashboard';

    public function render()
    {
        return view('livewire.cms.dashboard')->title($this->title);
    }
}
