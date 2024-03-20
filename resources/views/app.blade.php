<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Task.</title>
    <link rel="icon" type="image/png" href="{{ asset('icon.png') }}">
    <style>
        body::-webkit-scrollbar,
        body::-webkit-scrollbar:horizontal {
            width: 0.7em;
            border-radius: 12px;
        }

        body::-webkit-scrollbar-track {
            /* box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); */
            border-radius: 12px;
        }

        body::-webkit-scrollbar-thumb,
        body::-webkit-scrollbar-thumb:horizontal {
            background-color: darkgrey;
            height: 1em;
            border-radius: 12px;
        }

        body::-webkit-scrollbar-thumb:hover,
        body::-webkit-scrollbar-thumb:horizontal:hover {
            background-color: rgb(146, 145, 145);

        }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <main class="w-full min-h-[calc(100vh-4em)]">
        @yield('home')
        @yield('adminLogin')
        @yield('userLogin')
        @yield('dashboard')
        @yield('chooseUser')
        @yield('newTask')
        @yield('viewTask')
        @yield('editTask')
        @yield('assignNewTask')
        @yield('manageCategory')
        @yield('mail')
        @yield('notFound')
    </main>
    <script src="https://unpkg.com/lucide@latest">
        lucide.createIcons();
    </script>
</body>

</html>
