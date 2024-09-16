<div>
    <x-mary-card title="{{ $title ?? '' }}" subtitle="{{ $title ?? '' }} Data" shadow separator>
        <div class="flex gap-5 mx-2">
            <x-mary-button
                label="Check All"
                icon="o-check"
                spinner
                class="btn-success btn-sm text-white w-1/2"
                wire:click="checkAll"
            />
            <x-mary-button
                label="Uncheck All"
                spinner
                class="btn-error btn-sm text-white w-1/2"
                wire:click="uncheckAll"
            />
        </div>
        @foreach($permissions as $route => $type)

            <div class="mx-2 mt-5">
                <h1 class="text-xl font-extrabold">Route: {{ $route }}</h1>
                <hr>
                <div class="grid grid-flow-row auto-rows-min gap-1">
                    <div class="grid lg:grid-cols-4 gap-5">
                        @foreach($type as $name => $value)
                            @php
                                $label = explode('.', $name);
                                $label = $label[0];
                            @endphp
                            <div x-data="{ check: {{ $value ? 'true' : 'false' }} }" x-init="$watch('check', value => {
                                $wire.{{ $value ? 'uncheck' : 'check' }}('{{ $name }}', '{{ $route }}');
                            });">
                                <x-mary-checkbox
                                    label="{{ ucfirst($label) }}"
                                    x-model="check"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </x-mary-card>
</div>
