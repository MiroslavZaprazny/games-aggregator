@props(['game'])
<div class="game mb-10">
    <div class="relative inline-block mb-3">
        <a href="/games/{{$game['slug']}}">
            <img src="{{$game['coverImgUrl']}}" alt="game cover"
                class="hover:opacity-75 transition ease-in-out duration-200">
        </a>
        <div class="absolute bottom-0 right-0 bg-gray-800 rounded-full w-16 h-16"
            style="right: -20px; bottom:-20px;">
            <div class="text-sm font-semibold flex items-center justify-center h-full">
                {{ $game['rating'] }}%
            </div>
        </div>
    </div>
    <div class="title">
        <a href="/games/{{$game['slug']}}" class="font-semibold leading-tight hover:text-gray-400">{{ $game['name'] }}</a>
    </div>
    <div class="text-gray-400">
        {{$game['platforms']}}
    </div>
</div>