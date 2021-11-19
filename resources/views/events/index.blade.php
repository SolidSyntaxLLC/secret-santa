<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            {{ __('Upcoming Events') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($events->isEmpty())
                <x-empty-state>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </div>
                    <div>
                        You have no upcoming events.
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('events.create') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Event
                        </a>
                    </div>
                </x-empty-state>
            @else
                <div class="mb-5">
                    <a href="{{ route('events.create') }}" class="btn btn-primary" style="width: 150px">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Event
                    </a>
                </div>
                <div class="grid grid-col-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($events as $event)
                        <div @class(['card', 'bg-dark text-light' => $loop->first, 'bg-light text-dark border-dark border-2' => !$loop->first])>
                        <div class="card-header">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="card-title">
                            {{ $event->name }}
                        </div>
                        <div class="card-body"></div>
                        <div class="card-footer">
                            <div class="flex justify-between content-center">
                                <div>{{ date('M j, Y', strtotime($event->date)) }}</div>
                                <div class="text-laccent font-semibold leading-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ now()->diffInDays($event->date) }} Days Away
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
        </div>
        @endif
    </div>
    </div>
</x-app-layout>
