@php
    $full = floor($value);
    $half = ($value - $full) >= 0.5;
@endphp
<div class="flex items-center gap-1 text-{{ $size }}xl">
    @for($i=1;$i<=5;$i++)
        @if($i <= $full)
            <svg class="w-5 h-5 fill-yellow-400" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.545.999 7.41l6.06-.881L10 1l2.94 5.529 6.06.881-4.5 4.134 1.378 6.545z"/></svg>
        @elseif($i == $full + 1 && $half)
            <div class="relative w-5 h-5">
                <svg class="absolute inset-0 w-5 h-5 fill-yellow-400 clip-half" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.545.999 7.41l6.06-.881L10 1l2.94 5.529 6.06.881-4.5 4.134 1.378 6.545z"/></svg>
                <svg class="absolute inset-0 w-5 h-5 fill-gray-300" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.545.999 7.41l6.06-.881L10 1l2.94 5.529 6.06.881-4.5 4.134 1.378 6.545z"/></svg>
            </div>
        @else
            <svg class="w-5 h-5 fill-gray-300" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.545.999 7.41l6.06-.881L10 1l2.94 5.529 6.06.881-4.5 4.134 1.378 6.545z"/></svg>
        @endif
    @endfor
    <span class="ml-1 text-sm text-gray-600">{{ number_format($value, 2) }}</span>
</div>

<style>
.clip-half { clip-path: inset(0 50% 0 0); }
</style>
