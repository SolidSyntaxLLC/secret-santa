@props(['type', 'message', 'link', 'buttonText'])

<div>
    @switch ($type)
        @case('success')
            <x-banner type="success" message="{{ $message }}" link="{{ $link }}" buttonText="{{ $buttonText }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </x-slot>
            </x-banner>
            @break

        @case('warning')
            <x-banner type="warning" message="{{ $message }}" link="{{ $link }}" buttonText="{{ $buttonText }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </x-slot>
            </x-banner>
            @break

        @case('danger')
            <x-banner type="danger" message="{{ $message }}" link="{{ $link }}" buttonText="{{ $buttonText }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </x-slot>
            </x-banner>
            @break

        @default
        <x-banner type="info" message="{{ $message }}" link="{{ $link }}" buttonText="{{ $buttonText }}">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-slot>
        </x-banner>
    @endswitch
</div>
