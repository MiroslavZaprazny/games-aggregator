<div wire:init="loadPopularGames" class="popular-games-container pt-12">
    <h2 class="mb-12 font-semibold text-blue-500 uppercase tracking-wide">
        Popular games
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
        @forelse ($popularGames as $game)
            <x-game-card :game="$game"/>
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
