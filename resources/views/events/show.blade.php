<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            {{ $event->name }}
        </h2>

        <div class="flex justify-start content-center mt-3">
            <div class="font-semibold leading-none mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ date('M j, Y', strtotime($event->date)) }}
            </div>
            <div class="text-laccent font-semibold leading-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ now()->diffInDays($event->date) }} Days Away
            </div>
        </div>
    </x-slot>

    <div x-data="{ modal: false }" class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <div class="flex justify-start content-center">
                    <div class="mr-3">
                        <a href="{{ route('events.edit', ['id' => $event->id]) }}" class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            {{ __('Edit') }}
                        </a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger" @click="modal = true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            {{ __('Delete') }}
                        </button>
                    </div>
                </div>
            </div>

            @if(!$event->attendees->isEmpty())
                <div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                Name
                                            </th>
                                            <th scope="col">
                                                Email
                                            </th>
                                            <th scope="col">
                                                Phone
                                            </th>
                                            <th scope="col">
                                                Wishlist
                                            </th>
                                            <th scope="col" class="relative text-center">
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($event->attendees as $attendee)
                                                <tr>
                                                    <td>{{ $attendee->name }}</td>
                                                    <td>{{ $attendee->email }}</td>
                                                    <td>{{ $attendee->phone }}</td>
                                                    <td>
                                                        <a href="{{ $attendee->wishlist }}" target="_blank">
                                                            {{ $attendee->wishlist }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center justify-center">
                                                            <div>
                                                                <a href="{{ route('attendees.show', ['id' => $attendee->event_id, 'attendee' => $attendee]) }}" class="btn-icon btn-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            <div class="mx-2">
                                                                <a href="{{ route('attendees.edit', ['id' => $attendee->event_id, 'attendee' => $attendee]) }}" class="btn-icon btn-warning">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="btn-icon btn-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <x-empty-state>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    You have no attendees for this event.
                </div>
                <div class="mt-2">
                    <a href="{{ route('attendees.create', ['id' => $event->id]) }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Attendee
                    </a>
                </div>
            </x-empty-state>
        @endif

        <div x-show="modal" x-transition>
            <x-modal title="Delete Event" message="Are you sure you want to delete this event? This action cannot be undone.">
                <x-slot name="icon">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </x-slot>
                <x-slot name="actions">
                    <a href="{{ route('events.destroy', ['id' => $event->id]) }}" class="btn btn-danger">
                        {{ __('Delete') }}
                    </a>
                    <button @click="modal = false" type="button" class="btn">
                        Cancel
                    </button>
                </x-slot>
            </x-modal>
        </div>
    </div>
</x-app-layout>
