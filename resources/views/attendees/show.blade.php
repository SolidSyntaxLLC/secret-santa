<x-app-layout>
    <x-slot name="header"></x-slot>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-dark shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-light">
                    {{ __('Attendee Information') }}
                </h3>
            </div>
            <div>
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t border-dark">
                        <dt class="text-sm font-medium text-dark">
                            {{ __('Name') }}
                        </dt>
                        <dd class="mt-1 text-sm text-dark sm:mt-0 sm:col-span-2">
                            {{ $attendee->name }}
                        </dd>
                    </div>
                    @if($attendee->email)
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t border-dark">
                            <dt class="text-sm font-medium text-dark">
                                {{ __('Email') }}
                            </dt>
                            <dd class="mt-1 text-sm text-dark sm:mt-0 sm:col-span-2">
                                {{ $attendee->email }}
                            </dd>
                        </div>
                    @endif
                    @if($attendee->phone)
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t border-dark">
                            <dt class="text-sm font-medium text-dark">
                                {{ __('Phone') }}
                            </dt>
                            <dd class="mt-1 text-sm text-dark sm:mt-0 sm:col-span-2">
                                {{ $attendee->phone }}
                            </dd>
                        </div>
                    @endif
                    @if($attendee->wishlist)
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t border-dark">
                            <dt class="text-sm font-medium text-dark">
                                {{ __('Wishlist') }}
                            </dt>
                            <dd class="mt-1 text-sm text-dark sm:mt-0 sm:col-span-2">
                                <a href="{{ $attendee->wishlist }}" target="_blank">
                                    {{ $attendee->wishlist }}
                                </a>
                            </dd>
                        </div>
                    @endif
                    @if($attendee->notes)
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t border-dark">
                            <dt class="text-sm font-medium text-dark">
                                {{ __('Notes') }}
                            </dt>
                            <dd class="mt-1 text-sm text-dark sm:mt-0 sm:col-span-2">
                                {{ $attendee->notes }}
                            </dd>
                        </div>
                    @endif
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
