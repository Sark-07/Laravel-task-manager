<ul class="flex items-center gap-2">
    <li x-data="{ show: false }" @click.away="show = false" class="relative">
        <button @click="show = !show" type="button" class="hover:bg-gray-100 items-center justify-center bg-transparent text-gray-900 border border-gray-300 border-dashed whitespace-nowrap font-medium transition-colors shadow-sm rounded-md px-3 py-4 text-xs h-8 flex">Sign In</button>
        <div x-show="show" class="w-max py-2 right-0 absolute border bg-white z-[99] rounded-md">
            <a href="/user/login" class="text-sm font-medium block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">User Sign In</a>
            <a href="/admin/login" class="text-sm font-medium block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">Admin Sign In</a>
        </div>
    </li>
    <li x-data="{ open: false }" @click.away="open = false" class="relative">
        <button @click="open = !open" type="button" class="hover:bg-gray-100 items-center justify-center bg-transparent text-gray-900 border border-gray-300 border-dashed whitespace-nowrap font-medium transition-colors shadow-sm rounded-md px-3 py-4 text-xs h-8 flex">Sign Up</button>
        <div x-show="open" class="w-max py-2 right-0 absolute border bg-white z-[99] rounded-md">
            <a href="/user/register" class="text-sm font-medium block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">User Sign Up</a>
            <a href="/admin/register" class="text-sm font-medium block px-4 py-2 hover:text-gray-900 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">Admin Sign Up</a>
        </div>
    </li>
</ul>