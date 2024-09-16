<div>
    <x-mary-card title="{{ $title ?? '' }}" subtitle="{{ $title ?? '' }} Data" shadow separator>
        <x-cms.header :$originRoute />
        <x-mary-table
            :headers="$searchBy"
            :rows="$get"
            :sort-by="$sortBy"
            wire:model="selected"
            selectable
            selectable-key="id"
            with-pagination
        >
            <x-slot:empty>
                <x-mary-icon name="o-cube" label="It is empty." />
            </x-slot:empty>
            @scope('actions', $data, $originRoute)
                <div class="flex">
                    <x-cms.actions.update-btn :route="$originRoute" :id="$data->id" />
                    <x-cms.actions.delete-btn :route="$originRoute" :id="$data->id" />
                </div>
            @endscope
        </x-mary-table>
    </x-mary-card>

    <x-mary-drawer wire:model="modals.defaultModal" class="w-11/12 lg:w-1/3" right>
        <x-mary-button label="Discard" class="btn btn-sm" icon="o-arrow-uturn-left" x-on:click="$wire.modals['defaultModal'] = false" />
        <x-mary-form wire:submit="save" class="mt-5">
            <div class="grid grid-flow-row auto-rows-min gap-1">
                <div class="grid lg:grid-cols-2 gap-5">
                    <x-mary-input label="Name" wire:model="form.name" placeholder="Name" />
                    <x-mary-input label="Icon" wire:model="form.icon" placeholder="Icon" />
                    <x-mary-input label="Route" wire:model="form.route" placeholder="Route" />
                    <x-mary-input label="Ordering" wire:model="form.ordering" placeholder="Ordering" />
                </div>
            </div>
            <x-slot:actions>
                <x-mary-button label="Reset" icon="o-arrow-path" class="btn-warning btn-sm" x-on:click="$wire.resetAll()" />
                <x-mary-button label="Save" icon="o-paper-airplane" class="btn-success btn-sm" type="submit" spinner="save" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-drawer>
</div>
