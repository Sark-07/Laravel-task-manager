@extends('app')
@section('notFound')
    <section class="w-full h-screen grid place-items-center">
        <main class="flex flex-col gap-4 items-center justify-center">
            <h1 class="text-4xl font-bold text-gray-700">OOPS!! 404 | Page not Found</h1>
            <a class="py-4 px-4 mt-2 rounded-md bg-gray-950 hover:bg-[#000000df] text-white font-medium" href="/">Go Back</a>
        </main>
    </section>
@endsection