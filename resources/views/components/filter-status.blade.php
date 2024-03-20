<div x-show="open" class="flex absolute z-30 left-0 w-fit flex-col gap-1 h-fit rounded-md border py-2 text-sm shadow-sm bg-white">
    <div class="flex hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center">   
        <a href="{{url()->current()}}?status=pending&{{http_build_query(request()->except('status', 'page'))}}" class="text-sm font-medium text-gray-800">Pending</a>
    </div>
    <div class="flex hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center">   
        <a href="{{url()->current()}}?status=progress&{{http_build_query(request()->except('status', 'page'))}}" class="text-sm font-medium text-gray-800">Progress</a>
    </div>
    <div class="flex hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center">   
        <a href="{{url()->current()}}?status=completed&{{http_build_query(request()->except('status', 'page'))}}" class="text-sm font-medium text-gray-800">Completed</a>
    </div>
</div>