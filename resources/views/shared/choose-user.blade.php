@extends('app')
@section('chooseUser')
<section class="w-full h-screen grid place-items-center">
    <main class="flex items-center justify-center p-4 shadow-md rounded-md">
        <a href="{{ Auth::check() ? route('user.dashboard') : route('user.view') }}">
            <div class="py-8 px-10 flex flex-col items-center gap-2 transform transition duration-250 hover:scale-110">
                <p class="font-medium text-2xl">
                    User
                </p>
                <div class="text-center text-2xl">
                    <i data-lucide="arrow-big-left-dash"></i>
                </div>
            </div>
        </a>
        <a href="{{ Auth::check() ? route('admin.dashboard') : route('admin.view') }}">
        <div class="py-8 px-10 flex flex-col items-center gap-2 transform transition duration-250 hover:scale-110">
            <p class="font-medium text-2xl">
                Admin
            </p>
            <div class="text-center">
                <i data-lucide="arrow-big-right-dash"></i>
            </div>
        </div>
    </a>
    </main>
</section>
@endsection