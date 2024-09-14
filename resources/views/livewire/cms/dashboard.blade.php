<div>
    <x-mary-form wire:submit="customSave">
        <x-mary-file wire:model="file" label="Upload Image" hint="Only png and jpeg allowed" accept="image/png, image/jpeg">
            <img src="{{ asset('assets/upload.svg') }}" class="h-40 rounded-lg" />
        </x-mary-file>
        <x-mary-markdown wire:model="text" label="Blog post" />
        <x-slot:actions>
            <x-mary-button label="Cancel" />
            <x-mary-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-mary-form>
</div>
