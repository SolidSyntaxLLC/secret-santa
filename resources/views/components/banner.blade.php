@props(['type', 'message', 'link', 'buttonText', 'icon'])

<div x-data="{ open: true }">
    <div x-show="open" class="bg-{{ $type }} my-3">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center content-center">
                <span class="flex items-center content-center p-1">
                    @if(isset($icon))
                        {{ $icon }}
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </span>
                    <p class="ml-3 font-medium text-light truncate">
                    <span>
                        {{ $message }}
                    </span>
                    </p>
                </div>
                @if(isset($link))
                    <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                        <a href="{{ $link }}"
                           class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-dark bg-light">
                            {{ $buttonText }}
                        </a>
                    </div>
                @endif
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    <button type="button"
                            class="-mr-1 flex p-2 rounded-md sm:-mr-2"
                            @click="open = false">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-6 w-6 text-light" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
