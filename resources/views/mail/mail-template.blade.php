{{-- @component('mail::message') --}}
@extends('app')  
@section('mail')  
    <section class="max-w-2xl px-10 py-8 mx-auto border border-gray-300 rounded-md bg-white light:bg-gray-900">
        <header>
            <h1 class="text-4xl text-gray-700 font-bold">Task.</h1>
        </header>
        <main class="mt-8">
            <h2 class="text-gray-700 light:text-gray-200">Hi {{$name}},</h2>

            <p class="mt-2 leading-loose text-gray-600 light:text-gray-300">
                You have been asigned a task on <span class="font-semibold "><a href="localhost:8000/">Tasks.</a></span>
            </p>
            <p><span class="font-bold">Task Title: </span> {{$taskTitle}}</p>

            <button
                class="px-6 py-2 mt-4 text-sm font-medium tracking-wider border text-black capitalize transition-colors duration-300 transform bg-transparent rounded-lg hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-80">
                <a href="localhost:8000/">Open To See</a>
            </button>

            <p class="mt-8 text-gray-600 light:text-gray-300">
                Thanks, <br>
                <p class="font-bold">Team Task.</p> 
            </p>
        </main>

        <footer class="mt-8">
            <p class="text-gray-500 light:text-gray-400">
                This is system generated mail. Please do not reply.
            </p>
            <p class="mt-3 text-gray-500 dark:text-gray-400">© {{ date('Y') }} Task. All Rights Reserved.</p>
        </footer>
    </section>
@endsection
{{-- @endcomponent --}}