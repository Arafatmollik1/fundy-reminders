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
                        @method('PATCH')

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
                        <div class="flex items-center justify-start mt-4 gap-4">
                            <input type="submit" class="text-sm text-center h-fit w-full sm:w-[150px] p-2 text-white bg-blue-700 rounded" value="Update Participant" />
                            <a href="{{ route('admin.events.show' , $event->id) }}" class="text-sm text-center h-fit w-full sm:w-[100px] p-2 text-white bg-purple-600 rounded">Go back</a>
                        </div>
                    </form>
                    <form action="{{ route('admin.participants.destroy', [$event->id ,$participant->id] ) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this participant?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-8 text-sm text-center w-full h-fit sm:w-[150px] p-2 text-white bg-red-500 rounded">
                            Remove participant
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl mb-4">Trigger email</h2>
                    <x-fundy-ui-form
                        method="POST"
                        action="{{ route('admin.participants.sendemail', [$event->id, $participant->id]) }}"
                    >
                        <!-- Message -->
                        <div class="flex flex-col gap-2 overflow-hidden mb-4">
                            <div class="relative">
                                <x-fundy-ui-label for="event_message" value="Event Message" />
                            </div>
                            <x-fundy-ui-textarea name="event_message" id="event_message">{{ old('event_message', $event->message) }}</x-fundy-ui-textarea>
                        </div>

                        <!-- Amount -->
                        <div class="mb-4">
                            <x-fundy-ui-label for="amount" value="Amount" />
                            <x-fundy-ui-input name="amount" id="amount" type="number" step="0.01" value="{{ old('amount', $participant->amount) }}" class="block w-full mt-1" required />
                        </div>

                        <!-- Bank ID -->
                        <div class="mb-4">
                            <x-fundy-ui-label for="bank_id" value="Bank ID" />
                            <x-fundy-ui-input name="bank_id" id="bank_id" value="{{ old('bank_id', $event->bank_id) }}" class="block w-full mt-1" />
                        </div>

                        <!-- Recipient Name -->
                        <div class="mb-4">
                            <x-fundy-ui-label for="recipient_name" value="Recipient Name" />
                            <x-fundy-ui-input name="recipient_name" id="recipient_name" value="{{ old('recipient_name', $event->recipient_name) }}" class="block w-full mt-1" />
                        </div>

                        <!-- Mobile Pay -->
                        <div class="mb-4">
                            <x-fundy-ui-label for="mobile_pay" value="Mobile Pay Number" />
                            <x-fundy-ui-input name="mobile_pay" id="mobile_pay" value="{{ old('mobile_pay', $event->mobile_pay_number) }}" class="block w-full mt-1" />
                        </div>

                        <button type="submit" class="mt-4 text-red-600 hover:text-red-800 font-semibold">
                            Send email now
                        </button>
                    </x-fundy-ui-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

