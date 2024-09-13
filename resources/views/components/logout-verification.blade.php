{{-- Logout --}}
<form action="{{ route('logout') }}" method="POST" class="hidden" id="logout-form"><input type="hidden" name="_token" value="{{ csrf_token() }}"></form>

{{-- Logot verification --}}
<x-mary-modal id="logoutVerificationModal" title="Logout Verification" separator>
    <div>Are you sure you want to log out?</div>
    <x-slot:actions>
        <x-mary-button label="Cancel" onclick="logoutVerificationModal.close()" />
        <x-mary-button label="Confirm" class="btn-primary" onclick="document.getElementById('logout-form').submit()" />
    </x-slot:actions>
</x-mary-modal>
