<nav class="flex h-16 items-center px-8 border-b border-b-slate-100">
    <div class="brand mr-auto flex-1"><a href="/" class="font-extrabold text-4xl text-gray-700">Task.</a></div>
    <div class="ml-auto flex items-center space-x-4">
        @if (auth()->check())
        <x-nav-authenticated-dropdown/>            
        @else
        <x-nav-auth-dropdown/>            
        @endif
    </div>
    </div>
</nav>
