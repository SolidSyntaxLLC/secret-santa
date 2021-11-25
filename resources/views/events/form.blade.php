<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            {{ __('New Event') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('events.store') }}" class="min-w-max max-w-2xl mx-auto">
                @csrf

                <div class="input-group">
                    <label for="name">
                        {{ __('Event Name') }}
                        <span class="text-danger">&nbsp*</span>
                    </label>
                    <input type="text" name="name" id="name"/>
                </div>
                <div>
                    @error('name')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="date">
                        {{ __('Event Date') }}
                        <span class="text-danger">&nbsp*</span>
                    </label>
                    <input type="date" name="date" id="date"/>
                </div>
                <div>
                    @error('date')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-button class="mx-auto">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
