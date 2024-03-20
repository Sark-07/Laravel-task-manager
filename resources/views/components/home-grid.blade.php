@props(['tasks'])
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-auto-fit gap-4 w-full h-full">
    @foreach ($tasks as $task)
        <div class="flex flex-col px-8 py-6 max-h-[18rem] bg-white rounded-lg  border light:bg-gray-800">
            <div class="flex items-center justify-between">
                <span
                    class="font-medium text-gray-600 light:text-gray-300">{{ date('F j, Y', strtotime($task->due_date)) }}
                </span>
                <span class="font-medium text-xs text-gray-600 light:text-gray-300">
                    {{ ucwords($task->status) }}
                </span>
            </div>

            <div class="mt-2">
                <div class="flex items-center py-2 gap-2">
                    <span
                        class="font-bold text-gray-800 capitalize light:text-blue-400">{{ substr($task->title, 0, 30) }}..</span>
                    @foreach ($task->categories as $category)
                        <div
                            class="inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground">
                            {{ $category->category_name }}
                        </div>
                    @endforeach
                </div>
                <p class="mt-2 text-gray-600 light:text-gray-300">
                    {{ substr($task->description, 0, 120) }}..
                </p>
            </div>

            <div class="flex mt-auto items-center justify-between">
                <button
                    class="hover:bg-[#000000df] items-center justify-center bg-black text-white whitespace-nowrap font-medium transition-colors shadow-sm rounded-md px-3 py-5 my-4 text-xs h-8 flex"
                    type="button">
                    <a href="{{ auth()->check() ? '/view/task/' . $task->id : '/user/login' }}">Read More</a>
                </button>

                <div class="flex items-center">

                    <p class="font-medium text-sm text-gray-700 cursor-pointer light:text-gray-200">
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
    @endforeach
</div>
