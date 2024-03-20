@extends('app')
@include('layouts.nav')
@section('viewTask')
    <section class="w-full h-fit flex justify-center py-16">
        @if ($task)
            <div class="max-w-2xl overflow-hidden bg-white h-fit">
                <div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow border light:bg-gray-800 h-fit">
                    <img class="object-cover w-full h-64" src="{{ asset('storage/' . $task->thumbnail) }}" alt="thumbnail">
                    <div class="p-6">
                        <div>
                            <div class="flex items-center py-2 justify-between">
                                <span class="font-medium text-gray-600 light:text-gray-300">{{ date('F j, Y', strtotime($task->due_date)) }}
                                </span>
                                @if (isset($task->file))
                                <div>
                                    <a class="text-gray-700 text-sm font-medium hover:text-gray-900 hover:underline" href="{{asset('storage/'. $task->file)}}">File</a>
                                </div>       
                                @endif
                            </div>
                            <div class="flex items-center py-2 gap-2">
                                <span
                                    class="font-medium text-gray-950 capitalize light:text-blue-400">{{ $task->title }}</span>
                                @foreach ($task->categories as $category)
                                    <div
                                        class="inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground">
                                        {{ $category->category_name }}
                                    </div>
                                @endforeach

                            </div>
                            <p class="mt-2 font-semibold text-gray-600">
                                {{ $task->description }}</p>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <img class="object-cover object-center rounded-[50%] w-12 h-12"
                                        src="https://source.unsplash.com/random/?users&sig={{ rand(1, 5) }}"
                                        alt="Avatar">
                                    <p class="mx-2 font-medium text-gray-700 light:text-gray-200"tabindex="0" role="link">
                                        @foreach ($task->user as $key => $user)
                                            {{ $user->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="{ open: false }" @click.away="open = false" class="w-full">
                    @if (auth()->check())
                    <button @click="open = !open"
                        class="hover:bg-[#000000df] items-center justify-center bg-black text-white whitespace-nowrap font-medium transition-colors shadow-sm rounded-md px-3 py-5 my-4 text-xs h-8 flex"
                        type="button">
                        Leave a comment
                    </button>
                    @else
                    <button
                        class="hover:bg-[#000000df] items-center justify-center bg-black text-white whitespace-nowrap font-medium transition-colors shadow-sm rounded-md px-3 py-5 my-4 text-xs h-8 flex"
                        type="button">
                        <a href="/">
                            Login to Leave a comment
                        </a>
                    </button>
                    @endif
                    <x-comment-box :task="$task" />
                </div>
                @if (isset($task->comments))
                    @foreach ($task->comments()->latest()->with('user')->get() as $comment)
                        <x-comment :comment="$comment" :task="$task" />
                    @endforeach
                @endif
            </div>
        @else
            <h1 class="text-3xl w-full font-bold text-gray-800 text-center">No Task Found!</h1>
        @endif
    </section>
@endsection
