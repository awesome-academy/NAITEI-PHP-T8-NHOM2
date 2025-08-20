@php
    $currentLocale = app()->getLocale();
    $supportedLocales = config('app.supported_locales', []);
@endphp

<div class="relative" x-data="{ open: false }">
    <!-- Language Trigger Button -->
    <button @click="open = !open" 
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
        
        <!-- Current Language Flag & Name -->
        <span class="mr-1">{{ $supportedLocales[$currentLocale]['flag'] ?? '🌐' }}</span>
        <span>{{ $supportedLocales[$currentLocale]['name'] ?? 'Language' }}</span>
        
        <!-- Dropdown Arrow -->
        <div class="ml-1">
            <svg class="fill-current h-4 w-4 transform transition-transform duration-200" 
                 :class="{'rotate-180': open}" 
                 xmlns="http://www.w3.org/2000/svg" 
                 viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
    </button>

    <!-- Language Dropdown -->
    <div x-show="open" 
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
         role="menu">
        
        <div class="py-1" role="none">
            @foreach($supportedLocales as $locale => $data)
                <a href="{{ route('language.switch', $locale) }}" 
                   class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 {{ $locale === $currentLocale ? 'bg-gray-50 font-medium' : '' }}"
                   role="menuitem">
                    
                    <!-- Language Flag -->
                    <span class="mr-3">{{ $data['flag'] }}</span>
                    
                    <!-- Language Name -->
                    <span>{{ $data['name'] }}</span>
                    
                    <!-- Current Language Indicator -->
                    @if($locale === $currentLocale)
                        <svg class="ml-auto h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</div>