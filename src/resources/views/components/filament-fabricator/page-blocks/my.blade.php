@aware(['page'])
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-xl font-bold">{{ $heading }}</div>
        <div class="grid grid-cols-3 gap-4">
            @foreach($images as $path)
                <img src="{{$path}}" alt="">
            @endforeach
        </div>
        {!! $content !!}
    </div>
</div>
