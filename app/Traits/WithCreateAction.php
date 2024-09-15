<?php

namespace App\Traits;

use Spatie\Permission\Exceptions\UnauthorizedException;

trait WithCreateAction {
    public function create() {
        try {
            // Check permission
            if(!auth()->user()->can('create.' . $this->originRoute)) throw new UnauthorizedException(403, 'You do not have permission.');

            $this->isUpdate = false;

            $this->form->reset();

            $this->openModal();
        } catch (UnauthorizedException $exception) {
            $this->error(
                $exception->getMessage(),
                timeout: 2000,
            );
        }
    }
}
