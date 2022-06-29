<div wire:init="loadCompanies" class="companies lg:w-1/4 mt-12 lg:mt-0">
    <h2 class="font-semibold text-blue-500 uppercase tracking-wide">
        Game companies
    </h2>
    <div class="companies-container space-y-8 mt-3">
        @forelse ($companies as $company)
            <div class="flex pb-3">
                <a
                    href="@foreach ($company['websites'] as $website) {{ $website['url'] }}"> @endforeach
                    @if (isset($company['logo']['url'])) <img src="{{ $company['logo']['url'] }}" alt="game cover"
                        class="w-20 hover:opacity-75 transition ease-in-out duration-200"> @endif
                </a>
                <div class="ml-2">
                    <a href="@foreach ($company['websites'] as $website) {{ $website['url'] }}" @endforeach class="font-semibold leading-tight hover:text-gray-400">{{ $company['name'] }}</a>
                    <div class="text-gray-400 text-sm">
                        {{ gmdate('Y-m-d', $company['created_at']) }}
                    </div>
            </div>
    </div>
</div>
@empty
    @foreach (range(1,2) as $game)
        <div class="flex pb-1">
            <div class="w-20 h-20 bg-gray-700">
            </div>
            <div class="ml-2">
                <div class="leading-tight text-transparent bg-gray-700 rounded">Name...</div>
            </div>
        </div>   
    @endforeach
@endforelse
</div>
