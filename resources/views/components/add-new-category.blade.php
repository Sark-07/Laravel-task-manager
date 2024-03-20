<div class="relative w-full" x-data="{ open: false }" @click.away="open = false">
    <button @click="open = !open"
        class="items-center justify-center hover:bg-[#000000df] bg-black text-white whitespace-nowrap font-medium transition-colors border bg-background shadow-sm rounded-md px-3 py-2 text-xs h-8 flex">Add
        New</button>
    <form method="POST" action="/add/category" x-show="open"
        class="flex items-start gap-2 flex-col w-full mt-2 p-4 rounded-md border">
        @csrf
        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
            Task Title
        </label>
        <input
            class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium  focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50"
            value="{{ old('category_name') }}" placeholder="Eg: Good first" name="category_name" type="text">
        <button
            class="items-center justify-center hover:bg-[#000000df] bg-black text-white whitespace-nowrap font-medium transition-colors border bg-background shadow-sm rounded-md px-3 py-2 text-xs h-8 flex">Add
            Category</button>
    </form>
</div>