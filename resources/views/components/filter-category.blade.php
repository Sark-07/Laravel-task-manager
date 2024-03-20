@props(['categories'])
{{-- <form action="{{url()->current()}}" method="GET" x-show="open" class="flex absolute left-0 flex-col gap-1 z-30 h-fit w-fit rounded-md border py-2 text-sm shadow-sm bg-white">
    <input type="hidden" name="categories">
    @foreach ($categories as $category)
    <div class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center">
        <label for="{{$category->category_name}}" class="text-sm font-medium text-gray-800">{{$category->category_name}}</label>
        <input type="checkbox" {{ old($category->category_name, request($category->category_name))  ? 'checked' : '' }} value="{{$category->id}}" class="accent-slate-950" name="{{$category->category_name}}">
    </div>   
    @endforeach
    <div class="flex py-1 px-4 gap-2 w-full justify-start items-center">      
        <button
        class="items-center justify-center  hover:bg-gray-100 hover:text-[#000000df] bg-transparent text-black whitespace-nowrap font-medium transition-colors border shadow-sm rounded-md w-full py-1 text-xs flex">
       Filter
    </button>
    </div>
</form> --}}
<div x-show="open" class="flex absolute z-30 left-0 w-max flex-col gap-1 h-fit rounded-md border py-2 text-sm shadow-sm bg-white">
    @foreach ($categories as $category)
    <div class="flex hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center">   
        <a href="{{url()->current()}}?categoryId={{$category->id}}&{{http_build_query(request()->except('categoryId', 'page'))}}" class="text-sm font-medium text-gray-800">{{ucwords($category->category_name)}}</a>
    </div>
    @endforeach
</div>