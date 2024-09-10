<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-fundy-ui-alert type="success" class="bg-green-600 text-green-100 p-4 rounded my-4" />
            <div class="mb-6 p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-gray-900 font-semibold">
                    {{ __("Create an recurring event") }}
                </h2>
                <p>You can create an event and add people to set automated reminders</p>
                <div class="py-4">
                    <a href="{{ route('admin.events.create') }}" class="text-sm p-2 text-white bg-blue-700 rounded">Create an event</a>
                </div>
            </div>

            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-gray-900 font-semibold">
                    {{ __("Show your recurring events") }}
                </h2>
                <p>You can see all the recurring events and edit them and add people to set automated reminders</p>
                <div class="py-4">
                    <a href="{{ route('admin.events.index') }}" class="text-sm p-2 text-white bg-blue-700 rounded">Show my events</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
