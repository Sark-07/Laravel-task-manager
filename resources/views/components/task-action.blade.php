@props(['task', 'users'])
<div x-show="open" class="flex absolute z-30 right-0 flex-col gap-1 h-fit w-fit rounded-md border py-2 text-sm shadow-sm bg-white">
    <div class="flex hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center">   
        <a href="/view/task/{{$task->id}}" class="text-sm font-medium text-gray-800">View</a>
    </div>
    <div class="flex hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center">   
        <a href="/edit/task/{{$task->id}}" class="text-sm font-medium text-gray-800">Edit</a>
    </div>
    <form action="/assign/existing/task/{{$task->id}}" method="POST" x-data="{ open: false }" @click.away="open = false" class="relative h-fit m-0 hover:bg-slate-100 py-1 px-4 "> 
        @csrf
        <button type="button" @click="open = !open" class="flex gap-2 w-full justify-start items-center">
        <a href="#" class="text-sm font-medium text-gray-800">Assign</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-left w-4"><path d="M6 8L2 12L6 16"/><path d="M2 12H22"/></svg>
        </button>
        <x-users-dropdown :users="isset($users) ? $users : null" class="right-24"/> 
    </form>
    <form action="/delete/task/{{$task->id}}" method="POST" class="flex h-fit m-0 hover:bg-slate-100 py-1 px-4 gap-2 w-full justify-start items-center"> 
        @csrf  
        @method('delete')
        <button href="#" class="text-sm font-medium text-gray-800">Delete</button>
    </form>
</div>