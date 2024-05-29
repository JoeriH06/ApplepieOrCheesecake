<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>@yield('title', 'Applepie or Cheesecake')</title>
    <link href="{{ asset('website.css') }}" rel="stylesheet">
    <script type="module" src="{{ asset('website.js') }}"></script>
</head>

<body class="bg-gray-100 flex flex-col h-screen">
    <header class="p-4 bg-white shadow-md flex justify-between items-center bg-indigo-300">
        <img src="{{ asset('/images/appleicons.png') }}" alt="Icon" class="h-10 w-10">
        <section class="text-sm font-bold">Apple pie or Cheesecake</section>
        <button id="sidebar-toggle" aria-label="Toggle sidebar" aria-expanded="false" class="text-2xl sm:text-4xl"
            onclick="toggleSidebar()">&#9776;</button>
    </header>

    <!-- Sidebar -->
    <section class=" flex">
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('mySidebar');
                const isOpen = sidebar.classList.toggle('hidden');
                const sidebarToggle = document.getElementById('sidebar-toggle');
                sidebarToggle.setAttribute('aria-expanded', !isOpen);
            }

            function menu_close() {
                document.getElementById("mySidebar").classList.add('hidden');
            }
        </script>

        <aside class="sidebar bg-gray-100 fixed inset-y-0 right-0 w-64 transition-transform ease-in-out z-50 hidden"
            id="mySidebar">
            <section class="flex flex-col h-full justify-between">
                <section>
                    <section class="flex justify-between items-center px-4 py-2">
                        <h3 class="text-lg sm:text-xl font-semibold">Menu</h3>
                        <button class="text-2xl" onclick="menu_close()">&#10005;</button>
                    </section>
                    <!-- Sidebar content -->
                    <section class="px-4 py-2 flex flex-col space-y-2">
                        <a href="/" class="block text-sm text-gray-700 hover:bg-gray-200 mb-2">
                            <section class="py-1.5">Home</section>
                        </a>
                        <a href="/detailedpage" class="block text-sm text-gray-700 hover:bg-gray-200 mb-2">
                            <section class="py-1.5">Detailed Page</section>
                        </a>
                    </section>
                </section>
            </section>
        </aside>
    </section>

    <!-- Main Content -->
    <section class="container mx-auto p-4 sm:p-6">
        @yield('content')
    </section>
</body>

</html>
