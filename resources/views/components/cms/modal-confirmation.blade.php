<x-mary-modal id="modalConfirmation">
    <p class="mb-5 text-xl font-bold" id="modalConfirmationTitle"></p>
    <p class="mb-5" id="modalConfirmationText"></p>
    <x-slot:actions>
        <x-mary-button label="Cancel" icon="o-x-mark" onclick="modalConfirmation.close()" />
        <x-mary-button id="modalConfirmationButton" label="Confirm" icon="o-check" class="btn-primary" />
    </x-slot:actions>
</x-mary-modal>
