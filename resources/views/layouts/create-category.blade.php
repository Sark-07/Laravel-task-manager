@extends('app')
@include('layouts.nav')
@section('manageCategory')
    <section class="flex flex-col gap-4 items-start max-w-2xl pt-16 mx-auto">
        <div class="relative w-full flex items-center py-2 justify-between">
            <h1 class="text-4xl text-gray-700 font-bold">Manage Categories</h1>
            @if (null !== session('added') || null !== session('updated'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
                <p x-show="show" class="absolute right-0 py-2 px-4 rounded-sm bg-green-500 text-white">
                    {{ session('added') ?? session('updated') }}
                </p>
            </div>
        @endif
        @error('category_name')
        <p class="text-red-500 text-sm absolute right-0">{{ $message }}</p>
        @enderror
        </div>
        <table class="w-full block border rounded-md text-sm">
            <thead class="block">
                <tr class="border-b w-full justify-between flex transition-colors">
                    <th
                        class="h-12 flex-1 flex items-center justify-start text-left pl-10 px-4 align-middle font-medium text-muted-foreground w-fit">
                        Category ID</th>
                    <th
                        class="h-12 flex-1 flex items-center justify-start text-left px-4 align-middle font-medium text-muted-foreground">
                        Category Name</th>
                    <th
                        class="h-12 flex-1 flex items-center justify-start text-left px-4 align-middle font-medium text-muted-foreground">
                        Action</th>
                </tr>
            </thead>
            <tbody class="w-full block">
                @if (isset($categories))
                    @foreach ($categories as $category)
                        <x-category-row :category="$category"/>
                    @endforeach
                @endif
            </tbody>
        </table>
        <x-add-new-category/>
    </section>
@endsection
