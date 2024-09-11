<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ $participant->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Update form -->
                    <form action="{{ route('admin.participants.update', [$event->id, $participant->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Hidden Event ID -->
                        <x-fundy-ui-input name="event_id" type="hidden" value="{{ $event->id }}" />

                        <!-- Name -->
                        <div class="mb-4">
                            <x-fundy-ui-label for="name" value="Name" />
                            <x-fundy-ui-input name="name" id="name" value="{{ old('name', $participant->name) }}" class="block w-full mt-1" required />
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <x-fundy-ui-label for="email" value="Email" />
                            <x-fundy-ui-input name="email" id="email" type="email" value="{{ old('email', $participant->email) }}" class="block w-full mt-1" required />
                        </div>

                        <!-- Amount -->
                        <div class="mb-4">
                            <x-fundy-ui-label for="amount" value="Amount" />
                            <x-fundy-ui-input name="amount" id="amount" type="number" step="0.01" value="{{ old('amount', $participant->amount) }}" class="block w-full mt-1" required />
                        </div>

                        <!-- Date of Month -->
                        <div class="mb-4">
                            <x-fundy-ui-label for="date_of_month" value="Date of the Month" />
                            <x-fundy-ui-input name="date_of_month" id="date_of_month" type="number" value="{{ old('date_of_month', $participant->date_of_month) }}" class="block w-full mt-1" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="text-sm text-center h-fit w-[150px] p-2 text-white bg-blue-700 rounded">
                                Update Participant
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

