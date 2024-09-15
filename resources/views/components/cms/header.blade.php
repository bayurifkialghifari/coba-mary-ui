@props([
    'isCreate' => true,
    'isSearch' => true,
    'isPaginate' => true,
    'originRoute' => '',
    'createAction' => 'create',
])

@if($isCreate)
    <x-cms.actions.create-btn :route="$originRoute" :action="$createAction" />
@endif
{{ $slot ?? '' }}
<div class="flex justify-between flex-col gap-4 flex !gap-1 lg:!gap-4 md:flex-row m-2 mt-5">
    <div class="flex-1">
        @if($isPaginate)
            @php
                $recordOptions = [
                    [
                        'id' => 10,
                        'name' => '10 Records Per Page',
                    ],
                    [
                        'id' => 25,
                        'name' => '25 Records Per Page',
                    ],
                    [
                        'id' => 50,
                        'name' => '50 Records Per Page',
                    ],
                    [
                        'id' => 100,
                        'name' => '100 Records Per Page',
                    ],
                ];
            @endphp
            <x-mary-select
                icon="o-adjustments-horizontal"
                :options="$recordOptions"
                wire:model.live.debounce.750="paginate"
                class="select select-bordered select-sm w-full max-w-xs text-sm"
            />
        @endif
    </div>
    <div class="flex-1">
        @if($isSearch)
            <div class="float-end w-full max-w-md">
                <x-mary-input
                    type="text"
                    wire:model.live.debounce.250="search"
                    icon="o-magnifying-glass"
                    placeholder="Search...."
                    class="input-sm text-sm"
                />
            </div>
        @endif
    </div>
</div>
