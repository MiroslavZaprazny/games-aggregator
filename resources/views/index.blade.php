@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <livewire:popular-games />
        <div class="flex lg:flex-row flex-col my-16">
         <livewire:recently-reviewed />
        <livewire:companies />
        </div>
    </div>
@endsection
