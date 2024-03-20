<div class="container flex-col flex h-screen items-center justify-center relative mx-auto">
    @if (null !== session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
        <p x-show="show" class="mt-2 py-2 px-4 rounded-md bg-green-500 text-white">
            {{ session('success') }}
        </p>
    </div>    @endif
    <div class="w-full max-w-sm p-6 m-auto mx-auto bg-white rounded-lg shadow  light:bg-gray-800">
        <h1 class="text-center text-2xl font-bold mb-2">{{(Route::currentRouteName() === 'admin.view' || Route::currentRouteName() === 'admin.create') ? 'Admin' : 'User'}}</h1>
        <div class="flex justify-center mx-auto">
            <img class="md:h-16 md:w-16 h-7 sm:h-8" src="https://img.icons8.com/plasticine/100/task.png" alt="task"/>
        </div>
    
        <form class="mt-6" action="{{request()->fullUrl()}}" method="post">
            @csrf
            @if ((Route::currentRouteName() === 'admin.create' || Route::currentRouteName() === 'user.create'))       
            <div>
                <label for="name" class="block text-sm text-gray-800 light:text-gray-200">Name</label>
                <input value="{{old('name')}}" type="name" name="name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-lg light:bg-gray-800 light:text-gray-300 light:border-gray-600 focus:border-blue-400 light:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" />
            </div>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
            @endif
            <div class="mt-4">
                <label for="email" class="block text-sm text-gray-800 light:text-gray-200">Email</label>
                <input value="{{old('email')}}" type="email" name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-lg light:bg-gray-800 light:text-gray-300 light:border-gray-600 focus:border-blue-400 light:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" />
            </div>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
            <div class="mt-4">
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm text-gray-800 light:text-gray-200">Password</label>
                    {{-- <a href="#" class="text-xs text-gray-600 light:text-gray-400 hover:underline">Forget Password?</a> --}}
                </div>
    
                <input type="password" name="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-lg light:bg-gray-800 light:text-gray-300 light:border-gray-600 focus:border-blue-400 light:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" />
            </div>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
            @if ((Route::currentRouteName() === 'admin.create' || Route::currentRouteName() === 'user.create'))       
            <div class="mt-4">
                <div class="flex items-center justify-between">
                    <label for="password_confirmation" class="block text-sm text-gray-800 light:text-gray-200">Confirm Password</label>
                </div>
                <input type="password" name="password_confirmation" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-lg light:bg-gray-800 light:text-gray-300 light:border-gray-600 focus:border-blue-400 light:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" />
            </div>
            @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
            @endif
            @if(null !== session('failed-auth'))
                <p class="text-red-500 text-sm mt-1">{{session('failed-auth')}}</p>      
            @endif
            @if ((Route::currentRouteName() === 'admin.view' || Route::currentRouteName() === 'user.view'))       
            <div class="flex flex-row-reverse gap-2 w-full justify-end mt-2 items-center">
                <label for="remeber" class="text-sm text-gray-800">Remember me</label>
                <input type="checkbox" class="accent-slate-950" name="remember" >
            </div>
            @endif
            <div class="mt-6">
                <button class="w-full px-6 py-2.5 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-950 rounded-lg hover:bg-[#000000df] focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                    {{(Route::currentRouteName() === 'admin.view' || Route::currentRouteName() === 'user.view') ? 'Sign In' : 'Sign Up'}}
                </button>
            </div>
        </form>
    @if ((Route::currentRouteName() === 'admin.view'))          
    <p class="mt-8 text-xs font-light text-center text-gray-400">Don't have an account? <a href="/admin/register" class="font-medium text-gray-700 light:text-gray-200 hover:underline">Create One</a></p>        
    @elseif ((Route::currentRouteName() === 'user.view'))          
    <p class="mt-8 text-xs font-light text-center text-gray-400">Don't have an account? <a href="/user/register" class="font-medium text-gray-700 light:text-gray-200 hover:underline">Create One</a></p>        
    @elseif (Route::currentRouteName() == 'user.create')    
    <p class="mt-8 text-xs font-light text-center text-gray-400"> Already Have an Account? <a href="/user/login" class="font-medium text-gray-700 light:text-gray-200 hover:underline">Sign In</a></p>
    @elseif (Route::currentRouteName() == 'admin.create')    
    <p class="mt-8 text-xs font-light text-center text-gray-400"> Already Have an Account? <a href="/admin/login" class="font-medium text-gray-700 light:text-gray-200 hover:underline">Sign In</a></p>
    @endif
</div>
</div>