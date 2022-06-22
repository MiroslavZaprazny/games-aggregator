@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="similiar-games-container pt-12">
            <h2 class="mb-12 font-semibold text-blue-500 uppercase tracking-wide">
                Popular games
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach ($popularGames as $game )
                <div class="game mb-10">
                    <div class="relative inline-block mb-3">
                        <a href="">
                            <img src="{{Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}" alt="game cover"
                                class="hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="absolute bottom-0 right-0 bg-gray-800 rounded-full w-16 h-16"
                            style="right: -20px; bottom:-20px;">
                            <div class="text-sm font-semibold flex items-center justify-center h-full">
                                {{round($game['rating'], 2)}}%
                            </div>
                        </div>
                    </div>
                    <div class="title">
                        <a href="#" class="font-semibold leading-tight hover:text-gray-400">{{$game['name']}}</a>
                    </div>
                    <div class="text-gray-400">
                        @foreach ($game['platforms'] as $platform )
                            @if (array_key_exists('abbreviation', $platform))
                                {{$platform['abbreviation']}} &middot;
                            @endif
                        @endforeach
                    </div>                             
                </div>                     
                @endforeach
            </div>
        </div>
        <div class="flex lg:flex-row flex-col my-16">
            <div class="reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                 <h2 class="font-semibold text-blue-500 uppercase tracking-wide">
                    Recently rewieved
                </h2>
                <div class="games-container space-y-8 mt-6">
                    <div class="game-card flex p-6 bg-gray-800 rounded-xl">
                            <div class="relative inline-block mb-3 flex-none">
                                <a href="">
                                    <img src="/ff7.jpg" alt="game cover" class="w-64 hover:opacity-75 transition ease-in-out duration-200">
                                </a>
                                <div class="absolute bottom-0 right-0 bg-gray-900 rounded-full w-16 h-16" style="right: -20px; bottom:-20px;">
                                    <div class="text-sm font-semibold flex items-center justify-center h-full">
                                        80%
                                    </div>
                                </div>
                            </div>
                            <div class="ml-16 mt-5">
                                <a href="#" class="font-semibold text-lg leading-tight hover:text-gray-400">Final fantasy</a>
                                <div class="text-gray-400 text-sm mt-1">
                                    PC
                                </div>
                                <div class="mt-12 hidden lg:block">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos blanditiis ratione impedit eaque quasi quos autem esse optio omnis enim molestiae, alias, vero ut quaerat labore! Rerum incidunt assumenda voluptas.
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
                 <h2 class="font-semibold text-blue-500 uppercase tracking-wide">
                    Most Anticipated
                </h2>
                <div class="most-anticipated-container space-y-8 mt-3">
                    <div class="flex">
                        <a href="">
                            <img src="/ff7.jpg" alt="game cover" class="w-20 hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="ml-2">
                            <a href="#" class="font-semibold leading-tight hover:text-gray-400">Final fantasy</a>
                            <div class="text-gray-400 text-sm">
                                2022-22-22
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <a href="">
                            <img src="/ff7.jpg" alt="game cover" class="w-20 hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="ml-2">
                            <a href="#" class="font-semibold leading-tight hover:text-gray-400">Final fantasy</a>
                            <div class="text-gray-400 text-sm">
                                2022-22-22
                            </div>
                        </div>
                    </div>
                </div>

                 <h2 class="font-semibold text-blue-500 uppercase tracking-wide mt-12">
                   Coming soon
                </h2>
                <div class="most-anticipated-container space-y-8 mt-3">
                    <div class="flex">
                        <a href="">
                            <img src="/ff7.jpg" alt="game cover" class="w-20 hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="ml-2">
                            <a href="#" class="font-semibold leading-tight hover:text-gray-400">Final fantasy</a>
                            <div class="text-gray-400 text-sm">
                                2022-22-22
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <a href="">
                            <img src="/ff7.jpg" alt="game cover" class="w-20 hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="ml-2">
                            <a href="#" class="font-semibold leading-tight hover:text-gray-400">Final fantasy</a>
                            <div class="text-gray-400 text-sm">
                                2022-22-22
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection