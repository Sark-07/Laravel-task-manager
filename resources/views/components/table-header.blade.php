<div class="flex items-center justify-between space-y-2">
    <div>
        <h2 class="text-3xl font-bold tracking-tight">Welcome back, {{ auth()->user()->name }}</h2>
        <p class="text-muted-foreground">Here's a list of your tasks for you!</p>
    </div>
    @error('user')
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
            <p x-show="show" class="text-xs text-red-500">{{ $message }}</p>
        </div>
    @enderror
    @if (null !== session('assigned'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
            <p x-show="show" class="py-2 px-4 rounded-md bg-green-500 text-white">{{ session('assigned') }}</p>
        </div>
    @endif
</div>
