<div wire:init="loadRecentlyReviewedGames" class="reviewed w-full lg:w-3/4 mr-0 lg:mr-32" id="recently-reviewed" >
    <h2 class="font-semibold text-blue-500 uppercase tracking-wide">
        Recently reviewed games
    </h2>
    <div class="games-container space-y-8 mt-6">
        @forelse ($recentlyReviewedGames as $game)
            <div class="game-card flex p-6 bg-gray-800 rounded-xl">
                <div class="relative inline-block mb-3 flex-none">
                    <a href="/games/{{$game['slug']}}">
                        <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                            alt="game cover" class="w-64 hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                    <div class="absolute bottom-0 right-0 bg-gray-900 rounded-full w-16 h-16"
                        style="right: -20px; bottom:-20px;">
                        <div class="text-sm font-semibold flex items-center justify-center h-full">
                            {{ round($game['rating'], 2) }}
                        </div>
                    </div>
                </div>
                <div class="ml-16 mt-5">
                    <a href="/games/{{$game['slug']}}" class="font-semibold text-lg leading-tight hover:text-gray-400">
                        {{ $game['name'] }}
                    </a>
                    <div class="text-gray-400 text-sm mt-1">
                        @foreach ($game['platforms'] as $platform)
                            @if (array_key_exists('abbreviation', $platform))
                                {{ $platform['abbreviation'] }}
                            @endif
                        @endforeach
                    </div>
                    <div class="mt-12 hidden lg:block">
                        {{ $game['summary'] }}
                    </div>
                </div>
            </div>
        @empty
        @foreach (range(1,3) as $game )
            <div class="game-card flex p-6 bg-gray-800 rounded-xl">
                <div class="relative inline-block mb-3 flex-none">
                    <div class="bg-gray-700 h-full w-64">
                    </div>
                </div>
                <div class="ml-16 mt-5">
                    <div href="#" class="text-lg leading-tight bg-gray-700 text-transparent inline-block rounded">
                    Title goes here...
                    </div>
                    <div class="mt-12 hidden lg:block">
                        <span class="bg-gray-700 text-transparent inline-block mb-2 rounded">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                        </span>
                        <span class="bg-gray-700 text-transparent inline-block mb-2 rounded">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                        </span>
                        <span class="bg-gray-700 text-transparent inline-block rounded">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        @endforelse
    </div>
</div>