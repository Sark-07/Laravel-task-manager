<div x-show="open" class="flex absolute z-30 left-0 w-24 flex-col gap-1 h-fit rounded-md border py-2 text-sm shadow-sm bg-white">
    <a href="{{url()->current()}}?due_date=latest&{{http_build_query(request()->except('page', 'due_date'))}}" class="lex hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center text-sm font-medium text-gray-800">
        Latest
    </a>
    <a href="{{url()->current()}}?due_date=oldest&{{http_build_query(request()->except('page', 'due_date'))}}" class="lex hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center text-sm font-medium text-gray-800">
        Oldest
    </a>
</div>