@props(['categories'])
<div class="flex flex-1 items-center space-x-2">

    {{-- search --}}
    <form action="{{ url()->current() }}" method="GET" class="flex items-center h-fit m-0 gap-2">
        @if (request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        @if (request('categoryId'))
            <input type="hidden" name="categoryId" value="{{ request('categoryId') }}">
        @endif
        @if (request('due_date'))
            <input type="hidden" name="due_date" value="{{ request('due_date') }}">
        @endif
        <input
            class="flex rounded-md border bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground placeholder:text-xs focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-gray-400 disabled:cursor-not-allowed disabled:opacity-50 h-8 w-[150px] lg:w-[250px]"
            placeholder="Search by title or description or user or status.." name="search"
            value="{{ request('search') }}">
        <button
            class="items-center justify-center hover:bg-[#000000df] bg-black text-white whitespace-nowrap font-medium transition-colors border bg-background shadow-sm rounded-md px-3 py-2 text-xs h-8 flex">
            Search
        </button>
    </form>

    {{-- status --}}
    <div x-data="{ open: false }" @click.away="open = false" class="relative">
        <button @click="open = !open"
            class="inline-flex items-center border-gray-400 justify-center whitespace-nowrap font-medium transition-colors border bg-background shadow-sm hover:bg-gray-100 rounded-md px-3 text-xs h-8 border-dashed"
            type="button">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="mr-2 h-4 w-4">
                <path
                    d="M7.49991 0.876892C3.84222 0.876892 0.877075 3.84204 0.877075 7.49972C0.877075 11.1574 3.84222 14.1226 7.49991 14.1226C11.1576 14.1226 14.1227 11.1574 14.1227 7.49972C14.1227 3.84204 11.1576 0.876892 7.49991 0.876892ZM1.82707 7.49972C1.82707 4.36671 4.36689 1.82689 7.49991 1.82689C10.6329 1.82689 13.1727 4.36671 13.1727 7.49972C13.1727 10.6327 10.6329 13.1726 7.49991 13.1726C4.36689 13.1726 1.82707 10.6327 1.82707 7.49972ZM7.50003 4C7.77617 4 8.00003 4.22386 8.00003 4.5V7H10.5C10.7762 7 11 7.22386 11 7.5C11 7.77614 10.7762 8 10.5 8H8.00003V10.5C8.00003 10.7761 7.77617 11 7.50003 11C7.22389 11 7.00003 10.7761 7.00003 10.5V8H4.50003C4.22389 8 4.00003 7.77614 4.00003 7.5C4.00003 7.22386 4.22389 7 4.50003 7H7.00003V4.5C7.00003 4.22386 7.22389 4 7.50003 4Z"
                    fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                </path>
            </svg>
            Status
        </button>
        <x-filter-status />
    </div>

    {{-- category --}}
    <div x-data="{ open: false }" @click.away="open = false" class="relative">
        <button @click="open = !open"
            class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-colors border-gray-400 border bg-background shadow-sm hover:bg-gray-100 rounded-md px-3 text-xs h-8 border-dashed"
            type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:re4:"
            data-state="closed"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4">
                <path
                    d="M7.49991 0.876892C3.84222 0.876892 0.877075 3.84204 0.877075 7.49972C0.877075 11.1574 3.84222 14.1226 7.49991 14.1226C11.1576 14.1226 14.1227 11.1574 14.1227 7.49972C14.1227 3.84204 11.1576 0.876892 7.49991 0.876892ZM1.82707 7.49972C1.82707 4.36671 4.36689 1.82689 7.49991 1.82689C10.6329 1.82689 13.1727 4.36671 13.1727 7.49972C13.1727 10.6327 10.6329 13.1726 7.49991 13.1726C4.36689 13.1726 1.82707 10.6327 1.82707 7.49972ZM7.50003 4C7.77617 4 8.00003 4.22386 8.00003 4.5V7H10.5C10.7762 7 11 7.22386 11 7.5C11 7.77614 10.7762 8 10.5 8H8.00003V10.5C8.00003 10.7761 7.77617 11 7.50003 11C7.22389 11 7.00003 10.7761 7.00003 10.5V8H4.50003C4.22389 8 4.00003 7.77614 4.00003 7.5C4.00003 7.22386 4.22389 7 4.50003 7H7.00003V4.5C7.00003 4.22386 7.22389 4 7.50003 4Z"
                    fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>Category
        </button>
        <x-filter-category :categories="$categories" />
    </div>

    {{-- due data --}}
    <div x-data="{ open: false }" @click.away="open = false" class="relative">
        <button @click="open = !open"
            class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-colors border-gray-400 border bg-background shadow-sm hover:bg-gray-100 rounded-md px-3 text-xs h-8 border-dashed"
            type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:re4:"
            data-state="closed">Due Date
        </button>
       <x-filter-due-date/>
    </div>
    

    {{-- reset button --}}
    <div>
        <button>
            <a href="{{ url()->current() }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-rotate-ccw mr-2 h-4 w-4">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                    <path d="M3 3v5h5" />
                </svg>
        </button>
        </a>
    </div>
</div>
