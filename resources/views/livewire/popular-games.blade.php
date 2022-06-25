<div wire:init="loadPopularGames" class="popular-games-container pt-12">
    <h2 class="mb-12 font-semibold text-blue-500 uppercase tracking-wide">
        Popular games
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
        @forelse ($popularGames as $game)
            <div class="game mb-10">
                <div class="relative inline-block mb-3">
                    <a href="">
                        <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="game cover"
                            class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                    <div class="absolute bottom-0 right-0 bg-gray-800 rounded-full w-16 h-16"
                        style="right: -20px; bottom:-20px;">
                        <div class="text-sm font-semibold flex items-center justify-center h-full">
                            {{ round($game['rating'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="title">
                    <a href="#" class="font-semibold leading-tight hover:text-gray-400">{{ $game['name'] }}</a>
                </div>
                <div class="text-gray-400">
                    @foreach ($game['platforms'] as $platform)
                        @if (array_key_exists('abbreviation', $platform))
                            {{ $platform['abbreviation'] }} &middot;
                        @endif
                    @endforeach
                </div>
            </div>
        @empty
            @foreach (range(1,12) as $game)
                <div class="game mb-10">
                    <div class="relative inline-block mb-2">
                        <div class="bg-gray-700 w-52 h-64">
                        </div>
                    </div>
                    <div class="title">
                        <div class="leading-tight text-transparent bg-gray-700 inline-block rounded">Name goes here...</div>
                    </div>
                    <div class="text-transparent leading-tight bg-gray-700 inline-block mt-1 rounded">
                        PS4, PC...
                    </div>
                </div>       
            @endforeach
        @endforelse
    </div>
</div>
