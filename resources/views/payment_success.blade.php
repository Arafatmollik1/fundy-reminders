<x-guest-layout>
    <div>
        @if (session('success'))
            <x-fundy-ui-alert type="success" class="bg-green-600 text-green-100 p-4 rounded my-4" />
        @elseif (session('error'))
            <x-fundy-ui-alert type="error" class="bg-green-600 text-green-100 p-4 rounded my-4" />
        @endif
    </div>
</x-guest-layout>


