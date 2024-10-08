<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show all events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-fundy-ui-alert type="success" class="bg-green-600 text-green-100 p-4 rounded my-4" />
            <div class="flex flex-col mb-6 p-6 bg-white gap-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-gray-900 font-semibold">
                    {{ __("All your events") }}
                </h2>

                @foreach($allEvents as $event)
                    <div class="flex flex-col py-4 gap-8 sm:flex sm:flex-row sm:justify-between">
                        <div class="block">
                            <h1 class="text-lg font-bold mb-2">{{ $event->name }}</h1>
                            <p class="text-sm mb-2">{{ $event->message ?? 'No message to show' }}</p>

                            <div class="text-xs font-mono bg-gray-100 text-black p-4 border border-gray-300 rounded">
                                <pre class="whitespace-pre-line">
                                    Recurring date: {{ $event->day_of_the_month ?? 'none' }}
                                    Amount: {{ $event->amount ?? 'none' }}
                                    Bank Id: {{ $event->bank_id ?? 'none' }}
                                    Recipient Name: {{ $event->recipient_name ?? 'none' }}
                                    Mobile Pay Number: {{ $event->mobile_pay_number ?? 'none' }}
                                    Created at: {{ $event->created_at }}
                                </pre>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 mt-4">
                            <a href="{{ route('admin.events.show', $event->id) }}" class="text-sm text-center h-fit w-[100px] p-2 text-white bg-blue-700 rounded">Show More</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-center h-fit w-[100px] p-2 text-white bg-red-500 rounded">
                                    Delete Event
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
