<div>
    <!-- TABLE  -->
    <x-mary-card>
        <x-mary-table :headers="$headers" :rows="$users" :sort-by="$sortBy">
            @scope('actions', $user)
                <x-mary-button icon="o-trash" wire:click="delete({{ $user['id'] }})" spinner class="btn-ghost btn-sm text-red-500" />
            @endscope
        </x-mary-table>
    </x-mary-card>
</div>
