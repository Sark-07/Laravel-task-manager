@extends('app')
@include('layouts.nav')
{{-- @section('title', 'Dashboard') --}}
@section('dashboard')
    <div class="h-fit max-w-[95%] mx-auto flex-1 flex-col space-y-8 p-8 md:flex">
        <x-table-header />
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <x-filter :categories="$categories" />
                <button
                    class="items-center justify-center hover:bg-[#000000df] bg-black text-white whitespace-nowrap font-medium transition-colors border bg-background shadow-sm rounded-md px-3 py-4 text-xs ml-auto hidden h-8 lg:flex"
                    type="button">
                    <a href="/new/task">New Task</a>
                </button>
            </div>
            <div class="rounded-md border">
                <div class="relative w-full overflow-auto">
                    <x-task-table :tasks="$tasks" :users="isset($users) ? $users : null" />
                </div>
            </div>
            {{-- <x-pagination-cn/> --}}
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
