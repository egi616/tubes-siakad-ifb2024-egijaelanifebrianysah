<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'w-full bg-primary-950 text-white font-semibold py-2.5 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors'
]) }}>
    {{ $slot }}
</button>