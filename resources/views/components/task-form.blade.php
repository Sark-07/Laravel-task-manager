@props(['task', 'users', 'categories'])
<div class="space-y-6 py-12 max-w-[50%] ml-32">
    <div class="relative">
        @if (Route::currentRouteName() === 'task.edit')
        <h3 class="text-2xl font-extrabold text-gray-700">Edit Your Existing Task</h3>
        @elseif (Route::currentRouteName() === 'assign.task.create')
        <h3 class="text-2xl font-extrabold text-gray-700">Assign a New Task To a User</h3>
        @else
        <h3 class="text-2xl font-extrabold text-gray-700">Create New Task</h3>
        <p class="text-sm text-muted-foreground">Create your new task and manage in a proper manner.</p>
        @endif
        @if (null !== session('created') || null !== session('updated') || null !== session('assigned'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
            <p x-show="show" class="absolute right-0 py-2 px-4 rounded-md bg-green-500 text-white">
                {{ session('created') ? session('created') : (session('updated') ? session('updated') : session('assigned')) }}
            </p>
        </div>
        @endif
    </div>      
    <form class="space-y-6" action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (Route::currentRouteName() === 'task.edit')
            @method('patch') 
        @endif

        {{-- title --}}
        <div class="space-y-2">
            <label
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                Task Title
            </label>
                <input
                class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium  focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50"
                value="{{old('title', (isset($task) ? $task->title : ''))}}" placeholder="Eg: Develop Software for BF" name="title" type="text">
            <p class="text-[0.8rem] text-muted-foreground">This is the title of your task and will be visible at your dashboard. 
                
            </p>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        {{-- due date --}}
        <div class="space-y-2">
            <label
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                Due Date</label>
                <input
                class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium  focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50"
                value="{{old('due_date', (isset($task) ? $task->due_date : ''))}}" name="due_date" type="date">
            <p class="text-[0.8rem] text-muted-foreground">Set a date so that you can keep track of the deadline.
            </p>
            @error('due_date')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        {{-- status --}}
        <div class="space-y-2" >
            <label
                class="text-sm font-medium flex items-center gap-1 justify-start  leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                Status
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"><path d="M4.93179 5.43179C4.75605 5.60753 4.75605 5.89245 4.93179 6.06819C5.10753 6.24392 5.39245 6.24392 5.56819 6.06819L7.49999 4.13638L9.43179 6.06819C9.60753 6.24392 9.89245 6.24392 10.0682 6.06819C10.2439 5.89245 10.2439 5.60753 10.0682 5.43179L7.81819 3.18179C7.73379 3.0974 7.61933 3.04999 7.49999 3.04999C7.38064 3.04999 7.26618 3.0974 7.18179 3.18179L4.93179 5.43179ZM10.0682 9.56819C10.2439 9.39245 10.2439 9.10753 10.0682 8.93179C9.89245 8.75606 9.60753 8.75606 9.43179 8.93179L7.49999 10.8636L5.56819 8.93179C5.39245 8.75606 5.10753 8.75606 4.93179 8.93179C4.75605 9.10753 4.75605 9.39245 4.93179 9.56819L7.18179 11.8182C7.35753 11.9939 7.64245 11.9939 7.81819 11.8182L10.0682 9.56819Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </label>
               <x-task-status :task="(isset($task) ? $task : null)"/>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        {{-- thumbnail --}}
        <div class="space-y-2">
            @if (isset($task) && (Route::currentRouteName() === 'task.edit'))
            <div class="flex items-center w-full h-fit gap-2">
                <div class="w-full">
                    <label class="text-sm font-medium block leading-none mb-3 peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Thumbnail</label>
                    <input class="flex h-fit py-[.45em] items-center w-full rounded-md border border-input bg-transparent px-3 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium  focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50"
                    name="thumbnail" type="file">
                </div>
                <div>
                    <img src="{{asset('storage/' . $task->thumbnail)}}" class="rounded-md w-32 h-16" alt="Task thumbnail">
                </div>
            </div>      
            @else
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Thumbnail</label>
            <input class="flex h-fit py-[.45em] items-center w-full rounded-md border border-input bg-transparent px-3 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium  focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50"
            name="thumbnail" type="file">
            @endif
            <p class="text-[0.8rem] text-muted-foreground">Set a thumbnail related to your task.
            </p>
            @error('thumbnail')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>


        {{-- Flile --}}
        <div class="space-y-2">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">File</label>
            <input class="flex h-fit py-[.45em] items-center w-full rounded-md border border-input bg-transparent px-3 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium  focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50"
            name="file" type="file">
            <p class="text-[0.8rem] text-muted-foreground">Upload a file related to your task. max: 2mb (optional).
            </p>
            @error('thumbnail')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        {{-- edit categories --}}
        @if (Route::currentRouteName() === 'task.edit')        
        <div class="space-y-2">
            <label
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                Categories
            </label>
            <x-category-dropdown :categories="isset($categories) ? $categories : null" :task="isset($task) ? $task : null"/>
            <p class="text-[0.8rem] text-muted-foreground">Set categories to categorize your tasks.
            </p>
            @if ($errors->has('categories'))
            <p class="text-red-500 text-sm mt-1">{{ $errors->first('categories') }}</p>
            @endif
        </div>

        {{-- user adding new categories --}}
        @elseif (Route::currentRouteName() === 'task.create' || Route::currentRouteName() === 'assign.task.create')
        <div class="space-y-2">
            <label
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                Categories
            </label>
            <x-category-dropdown :categories="isset($categories) ? $categories : null" />
            <p class="text-[0.8rem] text-muted-foreground">Set categories to categorize your tasks.
            </p>
            @if ($errors->has('categories'))
            <p class="text-red-500 text-sm mt-1">{{ $errors->first('categories') }}</p>
            @endif
        </div>
        @endif

        {{-- show users --}}
        @if (Route::currentRouteName() === 'assign.task.create')
        <div class="space-y-2">
            <label
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                Users
            </label>
            <div x-data="{ open: false }" class="w-fit cursor-pointer relative rounded-md shadow-sm text-sm border">
                <div @click="open = !open" class="font-medium w-full py-2 px-4" x-text="open ? 'Close' : 'Expand'"></div>
                <x-users-dropdown :users="isset($users) ? $users : null" class="left-0"/>
            </div>
            <p class="text-[0.8rem] text-muted-foreground">Select a user to assign the task.
            </p>
            @error('user')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        @endif

        {{-- description --}}
        <div class="space-y-2"><label
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                for=":R3ttenlbq6la:-form-item">Description</label>
            <textarea
                class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50 resize-none" 
                placeholder="Tell us a little bit about yourself" name="description">{{old('description', (isset($task) ? $task->description : 'I own a computer'))}}</textarea>
            <p class="text-[0.8rem] text-muted-foreground">Describe your task a little bit so that you can know about it later.
            </p>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        {{-- button --}}
        <button
            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-gray-950
            text-white hover:bg-[#000000df] d shadow hover:bg-primary/90 h-9 px-4 py-2"
            type="submit">
            @if (Route::currentRouteName() === 'task.create')
             Add Task  
            @elseif (Route::currentRouteName() === 'task.edit')
            Update
            @elseif (Route::currentRouteName() === 'assign.task.create')
            Assign
            @endif
        </button>
    </form>
</div>