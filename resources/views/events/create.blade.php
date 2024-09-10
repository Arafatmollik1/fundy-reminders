<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col mb-6 p-6 bg-white gap-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-gray-900 font-semibold">
                    {{ __("Create an recurring event") }}
                </h2>
                    <x-fundy-ui-form action="{{ route('admin.events.store') }}" class="flex flex-col gap-6 overflow-hidden">
                        <div class="relative">
                            <x-fundy-ui-label for="event_name" />
                            <x-fundy-ui-input name="event_name" id="event_name"></x-fundy-ui-input>
                        </div>

                        <div class="relative">
                            <x-fundy-ui-checkbox name="it_is_recurring" id="it_is_recurring"/>
                            <x-fundy-ui-label for="it_is_recurring" />
                        </div>

                        <div class="relative">
                            <x-fundy-ui-checkbox name="it_requires_payment" id="it_requires_payment"/>
                            <x-fundy-ui-label for="it_requires_payment" />
                        </div>

                        <div class="relative">
                            <x-fundy-ui-label for="event_date_for_each_month" value="Event date for each month" />
                            <x-fundy-ui-input name="event_date" id="event_date_for_each_month" placeholder="Choose from 1 to 31"></x-fundy-ui-input>
                        </div>

                        <div class="relative">
                            <x-fundy-ui-label for="amount"/>
                            <x-fundy-ui-input name="amount" id="amount"></x-fundy-ui-input>
                        </div>

                        <div class="relative">
                            <x-fundy-ui-label for="bank_id"/>
                            <x-fundy-ui-input name="bank_id" id="bank_id"></x-fundy-ui-input>
                        </div>

                        <div class="relative">
                            <x-fundy-ui-label for="recipient_name"/>
                            <x-fundy-ui-input name="recipient_name" id="recipient_name"></x-fundy-ui-input>
                        </div>

                        <div class="relative">
                            <x-fundy-ui-label for="mobile_pay"/>
                            <x-fundy-ui-input name="mobile_pay" id="mobile_pay"></x-fundy-ui-input>
                        </div>

                        <div class="relative">
                            <x-fundy-ui-label for="event_message"/>
                        </div>
                        <x-fundy-ui-textarea name="event_message" id="event_message"></x-fundy-ui-textarea>


                        @if(!empty($errors->all()))
                            @foreach($errors->all() as $error)
                                <div class="text-red-500">{{ $error }}</div>
                            @endforeach
                        @endif

                        <div class="py-4">
                            <x-fundy-ui-form-button action="submit" class="text-sm p-2 text-white bg-blue-700 rounded">Create an event</x-fundy-ui-form-button>
                        </div>
                </x-fundy-ui-form>
            </div>
        </div>
    </div>
</x-app-layout>
