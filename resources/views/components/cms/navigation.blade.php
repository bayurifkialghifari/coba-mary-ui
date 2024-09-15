{{-- class="active" --}}
@foreach ($menus as $menu)
    @if(auth()->user()->can('view.'.$menu->route) || $menu->route == '#')
        @if(count($menu->menuChildren) > 0 && $menu->type != 'header')
            {{-- open --}}
            <x-mary-menu-sub title="{{ $menu->name }}" icon="{{ $menu->icon }}">
                @foreach($menu->menuChildren as $child)
                    <x-mary-menu-item
                        title="{{ $child->name }}"
                        icon="{{ $child->icon }}"
                        link="{{ \Illuminate\Support\Facades\Route::has($child->route) ? route($child->route) : '#' }}"
                    />
                @endforeach
            </x-mary-menu-sub>
        @else
            <x-mary-menu-item
                title="{{ $menu->name }}"
                icon="{{ $menu->icon }}"
                link="{{ \Illuminate\Support\Facades\Route::has($menu->route) ? route($menu->route) : '#' }}"
            />
        @endif
    @endif
@endforeach
