@props(['amount'=>0, 'label'=>'', 'url' => '#'])
<a href="{{ $url }}" {{ $attributes->merge(['class'=>"border rounded-md p-8  text-white bg-blue-900 text-center hover:bg-blue-800"]) }}>
    <div>
        <div class="text-4xl py-4">{{ $amount }}</div>
        <div class="text-sm">{{ $label }}</div>
    </div>
</a>
