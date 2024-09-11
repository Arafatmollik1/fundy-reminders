<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event details') }}
        </h2>
    </x-slot>
{{--
    "id" => 1
    "name" => "Example 11"
    "day_of_the_month" => null
    "recurring" => "on"
    "has_message" => 0
    "message" => "Netflix Payment dates."
    "has_payment" => 1
    "amount" => 3.2
    "bank_id" => "FI121212323212"
    "recipient_name" => "Mollik"
    "mobile_pay_number" => "0449187713"
    "created_at" => "2024-09-11 19:01:48"
    "updated_at" => "2024-09-11 19:01:48"--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    Event: {{ $event->name }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p><strong>Recurring:</strong> {{ $event->recurring }} </p>
                    </div>
                    <div>
                        <p><strong>Day of the Month:</strong> {{ $event->day_of_the_month }} </p>
                    </div>
                    <div>
                        <p><strong>Has Payment:</strong> {{ $event->has_payment }} </p>
                    </div>
                    <div>
                        <p><strong>Amount:</strong> {{ $event->amount }} </p>
                    </div>
                    <div>
                        <p><strong>Bank ID:</strong> {{ $event->bank_id }} </p>
                    </div>
                    <div>
                        <p><strong>Recipient Name:</strong> {{ $event->recipient_name }} </p>
                    </div>
                    <div>
                        <p><strong>Mobile Pay Number:</strong> {{ $event->mobile_pay_number }} </p>
                    </div>
                    <div>
                        <p><strong>Created At:</strong> {{ $event->created_at }} </p>
                    </div>
                    <div>
                        <p><strong>Updated At:</strong> {{ $event->updated_at }} </p>
                    </div>
                    <div>
                        <p><strong>Message:</strong> {{ $event->message }} </p>
                    </div>
                </div>
                <div class="flex items-center justify-around my-8">
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="text-sm text-center h-fit w-[100px] p-2 text-white bg-blue-700 rounded">Edit</a>
                    <a href="{{ route('admin.events.index') }}" class="text-sm text-center h-fit w-[150px] p-2 text-white bg-blue-500 rounded">Add participants</a>
                    <a href="{{ route('admin.events.destroy', $event->id) }}" class="text-sm text-center h-fit w-[100px] p-2 text-white bg-red-500 rounded">Remove</a>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                        All Participants
                    </h2>
                </div>
                <div class="space-y-4">
                    @foreach ($participants as $participant)
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between bg-white shadow p-4 rounded-md">
                            <div class="flex-1">
                                <p class="font-semibold text-gray-900">{{ $participant->name }}</p>
                                <p class="text-gray-600">{{ $participant->email }}</p>
                            </div>
                            <div class="mt-2 md:mt-0">
                                <a href="{{ route('participants.edit', $participant->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                                    Edit
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
