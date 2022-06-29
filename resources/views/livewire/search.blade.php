<div class="relative">
    <input wire:model.debounce.300="search"
    type="search" class="bg-gray-700 text-sm rounded-full pl-8 py-2 px-3 focus:outline-none" 
    placeholder="Search...">

    <div class="absolute top-0 flex items-center h-full ml-1">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>

    @if (strlen($search) >= 2)
        <div class="absolute z-50 bg-gray-800 text-sm rounded-lg mt-1 w-52">
            @if (count($searchResults) > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class=" border-b border-gray-700">
                            @isset($result['game'])
                                <a class="block p-3 hover:bg-gray-700 flex items-center"  href="/games/{{$result['game']['slug']}}">                       
                            @endisset
                                @if (isset($result['game']['cover']))
                                    <img src="{{Str::replaceFirst('thumb', 'cover_small', $result['game']['cover']['url'])}}" alt="" class="w-12 h-16 object-cover">        
                                @endif
                                <span class="ml-4">{{$result['name']}}</span>
                            </a>
                        </li>             
                    @endforeach
                </ul>
            @else
                <div class="p-3">
                    No results for "{{$search}}"
                </div>
            @endif
        </div>
    @endif
</div>