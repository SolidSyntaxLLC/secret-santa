<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            @if(isset($attendee))
                {{ __('Edit Attendee') }}
            @else
                {{ __('New Attendee') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ isset($attendee) ? route('attendees.update', ['id' => $event_id, 'attendee' => $attendee]) : route('attendees.store', ['id' => $event_id]) }}" class="min-w-max max-w-2xl mx-auto">
                @csrf

                <div class="input-group">
                    <label for="name">
                        {{ __('Attendee Name') }}
                        <span class="text-danger">&nbsp*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ $attendee->name ?? old('name') }}"/>
                </div>
                <div>
                    @error('name')
                    <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="email">
                        {{ __('Attendee Email') }}
                        <span class="text-danger">&nbsp*</span>
                    </label>
                    <input type="text" name="email" id="email" value="{{ $attendee->email ?? old('email') }}"/>
                </div>
                <div>
                    @error('email')
                    <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="phone">
                        {{ __('Attendee Phone') }}
                        <span class="text-danger">&nbsp*</span>
                    </label>
                    <input type="text" name="phone" id="phone" value="{{ $attendee->phone ?? old('phone') }}"/>
                </div>
                <div>
                    @error('phone')
                    <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="wishlist">
                        {{ __('Attendee Wishlist') }}
                    </label>
                    <input type="text" name="wishlist" id="wishlist" value="{{ $attendee->wishlist ?? old('wishlist') }}"/>
                </div>
                <div>
                    @error('wishlist')
                    <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="notes">
                        {{ __('Notes') }}
                    </label>
                    <textarea name="notes" id="notes">{{ $attendee->notes ?? old('notes') }}</textarea>
                </div>
                <div>
                    @error('notes')
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
