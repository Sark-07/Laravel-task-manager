@props(['comment', 'task'])
<article class="flex flex-col h-fit mt-4 items-start gap-2 rounded-lg border py-6 px-4 text-left text-sm transition-all hover:bg-gray-100">
    <div class="flex w-full flex-col gap-1">
        <div class="flex items-center">
            <div class="flex items-center gap-2">
                <div class="font-semibold">{{$comment->user->name}}</div>
            </div>
            <div class="ml-auto text-xs text-muted-foreground">{{date('F j, Y', strtotime($task->due_date))}}</div>
        </div>
    </div>
    <div class="line-clamp-2 h-fit">
        {{$comment->body}}
    </div>
</article>
