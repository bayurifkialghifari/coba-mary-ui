@props([
    'route' => '',
    'action' => 'confirmDelete',
    'id' => '',
])
@can('delete.' . $route)
    <x-mary-button
        icon="o-trash"
        wire:click="{{ $action }}('{{ $id }}')"
        spinner
        class="btn-ghost text-error btn-sm"
    />
@endcan
