<?php

namespace App\Traits;

use Spatie\Permission\Exceptions\UnauthorizedException;

trait WithSaveAction {
    public function save() {
        try {
            // Check permission
            $permission = $this->isUpdate ? 'update.' : 'create.';

            // Check permission
            if(!auth()->user()->can($permission . $this->originRoute)) throw new UnauthorizedException(403, 'You do not have permission.');

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
