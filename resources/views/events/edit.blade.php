<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit an Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col mb-6 p-6 bg-white gap-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-gray-900 font-semibold">
                    {{ __("Edit Recurring Event") }}
                </h2>

                <!-- Edit Event Form -->
                <form action="{{ route('admin.events.update', $event->id) }}" class="flex flex-col gap-6 overflow-hidden" method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- Event Name -->
                    <div class="relative">
                        <x-fundy-ui-label for="event_name" value="Event Name" />
                        <x-fundy-ui-input name="event_name" id="event_name" value="{{ old('event_name', $event->name) }}" required></x-fundy-ui-input>
                    </div>
                    <!-- Recurring Checkbox -->
                    <div class="relative">
                        <x-fundy-ui-checkbox
                            name="it_is_recurring"
                            id="it_is_recurring"
                            :checked="isset($event->recurring)"
                        />
                        <x-fundy-ui-label
                            for="it_is_recurring"
                            value="Is Recurring?"
                        />
                    </div>
                    <!-- Requires Payment Checkbox -->
                    <div class="relative">
                        <x-fundy-ui-checkbox
                            name="it_requires_payment"
                            id="it_requires_payment"
                            :checked="isset($event->has_payment)"
                            />
                        <x-fundy-ui-label for="it_requires_payment" value="Requires Payment" />
                    </div>

                    <!-- Event Date for Each Month -->
                    <div class="relative">
                        <x-fundy-ui-label for="event_date_for_each_month" value="Event Date for Each Month" />
                        <x-fundy-ui-input name="event_date" id="event_date_for_each_month" value="{{ old('event_date', $event->day_of_the_month) }}" placeholder="Choose from 1 to 31" required></x-fundy-ui-input>
                    </div>

                    <!-- Amount -->
                    <div class="relative">
                        <x-fundy-ui-label for="amount" value="Amount" />
                        <x-fundy-ui-input name="amount" id="amount" type="number" step="0.01" value="{{ old('amount', $event->amount) }}" required></x-fundy-ui-input>
                    </div>

                    <!-- Bank ID -->
                    <div class="relative">
                        <x-fundy-ui-label for="bank_id" value="Bank ID" />
                        <x-fundy-ui-input name="bank_id" id="bank_id" value="{{ old('bank_id', $event->bank_id) }}"></x-fundy-ui-input>
                    </div>

                    <!-- Recipient Name -->
                    <div class="relative">
                        <x-fundy-ui-label for="recipient_name" value="Recipient Name" />
                        <x-fundy-ui-input name="recipient_name" id="recipient_name" value="{{ old('recipient_name', $event->recipient_name) }}"></x-fundy-ui-input>
                    </div>

                    <!-- Mobile Pay -->
                    <div class="relative">
                        <x-fundy-ui-label for="mobile_pay" value="Mobile Pay Number" />
                        <x-fundy-ui-input name="mobile_pay" id="mobile_pay" value="{{ old('mobile_pay', $event->mobile_pay_number) }}"></x-fundy-ui-input>
                    </div>

                    <!-- Event Message -->
                    <div class="relative">
                        <x-fundy-ui-label for="event_message" value="Event Message" />
                    </div>
                    <x-fundy-ui-textarea name="event_message" id="event_message">{{ old('event_message', $event->message) }}</x-fundy-ui-textarea>

                    <!-- Error Display -->
                    @if(!empty($errors->all()))
                        @foreach($errors->all() as $error)
                            <div class="text-red-500">{{ $error }}</div>
                        @endforeach
                    @endif

                    <div class="py-4">
                        <input type="submit" class="text-sm p-2 text-white bg-blue-700 rounded" value="Update Event"  />
                    </div>
                </form>
                <a href="{{ route('admin.events.show' , $event->id) }}" class="text-sm text-center h-fit w-[100px] p-2 text-white bg-purple-600 rounded">Go back</a>
                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-center h-fit w-[100px] p-2 text-white bg-red-500 rounded">
                        Delete Event
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
