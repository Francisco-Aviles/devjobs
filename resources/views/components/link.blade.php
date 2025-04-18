@php
    $classes = "text-sm text-gray-500 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{-- {{ __('Forgot your password?') }} --}}
    {{-- le pasamos la variable $slot para que agregue el texto que pusimos en el componente --}}
    {{$slot}}
</a>