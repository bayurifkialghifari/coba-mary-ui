<?php

namespace App\Traits;

use Spatie\Permission\Exceptions\UnauthorizedException;
use Livewire\Attributes\On;

trait WithDeleteAction {
    public function confirmDelete($id) {
        $this->dispatch('confirm', function: 'delete', id: $id);
    }

    #[On('delete')]
    public function delete($id) {
        try {
            // Check permission
            if(!auth()->user()->can('delete.' . $this->originRoute)) throw new UnauthorizedException(403, 'You do not have permission.');

            $this->form->delete($id);

            $this->success(
                'Data Deleted Successfully',
                timeout: 2000,
            );
        } catch (UnauthorizedException $exception) {
            $this->error(
                $exception->getMessage(),
                timeout: 2000,
            );
        }
    }
}
