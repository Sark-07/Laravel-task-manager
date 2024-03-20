@props(['categories', 'task'])
<div class="w-fit cursor-pointer relative rounded-md shadow-sm text-sm border" x-data="{ open: false }">
    <div @click="open = !open" class="font-medium w-full py-2 px-4" x-text="open ? 'Close' : 'Expand'"></div>

    {{-- <div x-show="open" class="flex absolute z-30 left-0 flex-col gap-1 h-fit w-fit rounded-md border py-2 text-sm shadow-sm bg-white">
        <div class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center">
            <label for="issue" class="text-sm font-medium text-gray-800">Issue</label>
            <input type="checkbox" {{ old('issue', $categories?->contains('category_name', 'issue'))  ? 'checked' : '' }} value="issue" class="accent-slate-950" name="issue">
        </div>
        <div class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center">
            <label for="feature" class="text-sm font-medium text-gray-800">Feature</label>
            <input type="checkbox" {{ old('feature', $categories?->contains('category_name', 'feature'))  ? 'checked' : '' }} value="feature" class="accent-slate-950" name="feature">
        </div>
        <div class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center">
            <label for="urgent" class="text-sm font-medium text-gray-800">Urgent</label>
            <input type="checkbox" {{ old('urgent', $categories?->contains('category_name', 'urgent'))  ? 'checked' : '' }} value="urgent" class="accent-slate-950" name="urgent">
        </div>
        <div class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center">
            <label for="bug" class="text-sm font-medium text-gray-800">Bug</label>
            <input type="checkbox" {{ old('bug', $categories?->contains('category_name', 'bug'))  ? 'checked' : '' }} value="bug" class="accent-slate-950" name="bug">
        </div>
    </div> --}}
    {{-- <div x-show="open" class="flex absolute z-30 left-0 flex-col gap-1 h-fit w-fit rounded-md border py-2 text-sm shadow-sm bg-white">
        <select multiple name="categories[]" class="scrollbar- accent-slate-950 w-24 h-fit">
            @foreach ($categories as $category)
                <option class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center" value="{{ $category->category_name }}" {{ in_array($category->category_name, old('categories', [])) ? 'selected' : '' }}>
                    {{ ucwords($category->category_name) }}
                </option>
            @endforeach
        </select>
    </div>     --}}
    <div x-show="open" class="flex absolute z-30 left-0 flex-col gap-1 h-fit w-max rounded-md border py-2 text-sm shadow-sm bg-white">
        @foreach($categories as $category)
        <div class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center">
            <label for="{{ $category->category_name }}" class="text-sm font-medium text-gray-800">{{ ucwords($category->category_name) }}</label>
            <input type="checkbox" {{ (old('categories') && in_array($category->category_name, old('categories'))) || (isset($task) && $task->categories->contains('category_name', $category->category_name)) ? 'checked' : '' }} value="{{ $category->category_name }}" class="accent-slate-950" name="categories[]">
        </div>
        @endforeach
    </div>
    
    
</div>
