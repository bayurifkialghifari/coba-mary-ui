@props([
    'route' => '',
    'action' => 'edit',
    'id' => '',
])
@can('update.' . $route)
    <x-mary-button
        icon="o-pencil"
        wire:click="{{ $action }}('{{ $id }}')"
        spinner
        class="btn-ghost text-primary btn-sm"
    />
@endcan
