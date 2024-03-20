<div x-data="{ open: false }" @click.away="open = false" class="relative">
    <button @click="open = !open"
        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">{{ auth()->user()->name }}
        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>

    <div x-show="open"
        class="z-10 font-normal absolute right-0 bg-white divide-y divide-gray-100 rounded-lg shadow w-max light:bg-gray-700 light:divide-gray-600">
        <ul class="py-2 text-sm text-gray-800 font-medium light:text-gray-400">
            @if (Route::currentRouteName() !== 'task.create')
                <li>
                    <a href="/new/task"
                        class="block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">New
                        Task</a>
                </li>
            @endif
            @if (Route::currentRouteName() === 'admin.dashboard' || Route::currentRouteName() === 'user.dashboard')
            
            @else
                <li>
                    <a href="{{ auth()->user()->type ? '/admin/dashboard' : '/user/dashboard' }}"
                        class="block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">Dashboard</a>
                </li>
            @endif
            @if (Route::currentRouteName() === 'admin.dashboard')
            <li>
                <a href="/manage/category"
                    class="block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">
                    Manage Categories</a>
            </li> 
            @endif
            @if (Route::currentRouteName() !== 'home')
            <li>
                <a href="/"
                    class="block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">Home</a>
            </li> 
            @endif
            <li>
                <a href="/assign/new/task"
                    class="block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">Assign
                    New Task</a>
            </li>
        </ul>
        <div class="py-2">
            <form action="{{ auth()->user()->type ? '/admin/logout' : '/user/logout' }}" method="POST"
                class="cursor-pointer m-0 px-4 py-2 hover:text-gray-900 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white">
                @csrf
                <button class="outline-none border-none font-medium bg-transparent">Sign Out</button>
            </form>
        </div>
    </div>
</div>