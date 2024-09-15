@props([
    'route' => '',
    'action' => 'create',
])
<div class="flex mx-2">
    @can('create.' . $route)
        <x-mary-button
            label="Create"
            icon="o-plus"
            class="btn-success btn-sm text-white"
            wire:click="{{ $action }}"
        />
    @endcan
</div>
