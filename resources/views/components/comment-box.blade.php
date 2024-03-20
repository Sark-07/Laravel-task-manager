@props(['task'])
<form action="/add/comment/{{$task->id}}" method="POST" class="rounded-xl border bg-card text-card-foreground shadow py-6"
    x-show="open">
    @csrf
    <div class="px-6 grid gap-6">
        <div class="grid gap-2">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                for="description">Comment</label>
            <textarea
                class="flex min-h-[120px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50"
                id="description" placeholder="Please include comments relevant to the task." name="body">{{old('body', 'Write a comment.')}}</textarea>
        </div>
    </div>
    @error('body')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    <div class="flex items-center px-6 justify-between mt-4">
        <span @click="open = false"
            class="inline-flex cursor-pointer items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors h-9 px-4 py-2">Cancel</span>
        <button
            class="items-center justify-center bg-black text-white whitespace-nowrap font-medium transition-colors shadow-sm rounded-md px-4 hover:bg-[#000000df] py-5 text-xs h-8 flex">Submit</button>
    </div>
</form>
