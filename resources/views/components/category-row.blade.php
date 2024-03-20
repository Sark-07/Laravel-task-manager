@props(['category'])
<tr x-data="{ show: false }" class="border-b flex justify-between transition-colors hover:bg-gray-100">
    <td class="p-4 pl-12 flex-1 flex items-center font-medium">{{ $category->id }}</td>
    <td class="p-4 flex-1 flex items-center font-medium">
        <p x-show="!show">{{ ucwords($category->category_name) }}</p>
        <form x-show="show" action="/update/category/{{ $category->id }}" method="POST"
            class="h-fit m-0 flex gap-2 items-center">
            @csrf
            @method('patch')
            <input
                class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors   focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50 placeholder:text-xs"
                value="{{ old('category_name') }}" placeholder="Eg: Good first" name="category_name" type="text">
            <button
                class="items-center justify-center hover:bg-[#000000df] bg-black text-white whitespace-nowrap font-medium transition-colors border bg-background shadow-sm rounded-md px-3 py-2 text-xs h-8 flex">Update</button>
        </form>
    </td>
    <td class="p-4 flex-1 flex gap-2 items-center">
        <form class="h-fit m-0" action="/delete/category/{{ $category->id }}" method="POST">
            @csrf
            @method('delete')
            <button class="bg-transparent border outline-none px-4 py-2 text-xs rounded-md">Delete</button>
        </form>
        <button @click="show = !show"
            class="bg-transparent border outline-none px-4 py-2 text-xs rounded-md">Edit</button>
    </td>
</tr>
