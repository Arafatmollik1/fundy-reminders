<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-fundy-ui-alert type="success" class="bg-green-600 text-green-100 p-4 rounded my-4" />
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
                <div class="flex flex-col my-8 gap-6 sm:flex sm:flex-row sm:items-center sm:justify-around">
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="text-sm text-center h-fit w-full sm:w-[100px] p-2 text-white bg-blue-700 rounded">Edit</a>
                    <a href="{{ route('admin.participants.create' , $event->id) }}" class="text-sm text-center h-fit w-full sm:w-[150px] p-2 text-white bg-blue-500 rounded">Add participants</a>
                    <a href="{{ route('admin.events.index') }}" class="text-sm text-center h-fit w-full sm:w-[100px] p-2 text-white bg-purple-600 rounded">Go back</a>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                        All Participants
                    </h2>
                </div>
                <div class="space-y-4">
                    @if(!empty($participants->toArray()))
                        @foreach ($participants as $participant)
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between bg-white shadow p-4 rounded-md">
                            <div class="flex-1">
                                <p class="font-semibold text-gray-900">{{ $participant->name }}</p>
                                <p class="text-gray-600">{{ $participant->email }}</p>
                            </div>
                            <div class="mt-2 md:mt-0">
                                <a href="{{ route('admin.participants.edit', [$event->id, $participant->id]) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                                    Edit
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p>No participants found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
