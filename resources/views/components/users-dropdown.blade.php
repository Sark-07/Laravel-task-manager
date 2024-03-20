@props(['users'])
{{-- <div x-show="open" class="{{ $attributes->get('class') }} flex absolute z-50 flex-col gap-1 h-fit w-max rounded-md border py-2 text-sm shadow-sm bg-white">
    @if (isset($users))
        @foreach ($users as $user)          
        <div class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center">
            <label for="user" class="text-sm font-medium text-gray-800">{{$user->name}}</label>
            <input type="radio" {{ old('user') == $user->id ? 'checked' : '' }} value="{{$user->id}}" class="accent-slate-950" name="user">
            
        </div>      
        @endforeach
    @endif
</div> --}}
<div x-show="open"
    class="{{ $attributes->get('class') }} flex absolute z-50 flex-col gap-1 h-fit w-max rounded-md border py-2 text-sm shadow-sm bg-white">
    @if (isset($users))
        @foreach ($users as $user)
            <div class="flex hover:bg-slate-100 py-1 px-4 flex-row-reverse gap-2 w-full justify-end items-center">
                <label for="user_{{ $user->id }}"
                    class="text-sm font-medium text-gray-800">{{ $user->name }}</label>
                <input type="checkbox" {{ in_array($user->id, (array) old('user', [])) ? 'checked' : '' }}
                    value="{{ $user->id }}" class="accent-slate-950" name="user[]">
            </div>
        @endforeach
    @endif
    @if (Route::currentRouteName() == 'admin.dashboard' || Route::currentRouteName() == 'user.dashboard')
        <button
            class="items-center w-fit justify-center hover:bg-[#000000df] bg-black text-white whitespace-nowrap font-medium transition-colors border bg-background shadow-sm rounded-md px-12 mx-auto py-1 text-[.7rem] flex">
            Assign
        </button>
    @endif
</div>
