@extends('app')
@section('home')
    @include('layouts.nav')
    <section class="w-full h-full px-12 py-8">
        <div class="mb-4 flex justify-between items-end py-2">
            <div>
                <h2 class="text-3xl font-bold tracking-tight">Welcome To Task.</h2>
                <p class="font-medium">Here's a list of tasks created by many users!</p>
            </div>
            <div class="ml-auto">
                <x-filter :categories="$categories" />
            </div>
        </div>
        @if (isset($tasks) && count($tasks) > 0)
        <x-home-grid :tasks="$tasks"/>
        @else
        <h1 class="text-3xl w-full font-bold text-gray-800 text-center py-8">No Task Found!</h1>
        @endif
    </section>
@endsection
