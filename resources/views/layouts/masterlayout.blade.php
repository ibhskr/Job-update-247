<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','JobUpdate247')</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    {{-- ================= NAVBAR ================= --}}
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="/" class="text-xl font-bold text-blue-600">
                    JobUpdate247
                </a>

                {{-- Desktop Menu --}}
                <nav class="hidden md:flex space-x-6 text-sm font-medium">
                    <a href="/" class="hover:text-blue-600">Home</a>
                    <a href="{{ route('pages.updates') }}" class="hover:text-blue-600">Updates</a>
                    <a href="{{ route('pages.results') }}" class="hover:text-blue-600">Results</a>
                    <a href="{{ route('pages.resource') }}" class="hover:text-blue-600">Resources</a>
                </nav>

                {{-- Mobile Button --}}
                <button id="menuBtn" class="md:hidden text-gray-600 focus:outline-none">
                    ☰
                </button>

            </div>

            {{-- Mobile Menu --}}
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <a href="/" class="block py-2 text-sm">Home</a>
                <a href="{{ route('pages.updates') }}" class="block py-2 text-sm">Updates</a>
                <a href="{{ route('pages.results') }}" class="block py-2 text-sm">Results</a>
                <a href="{{ route('pages.resource') }}" class="block py-2 text-sm">Resources</a>
            </div>

        </div>
    </header>


    {{-- ================= MAIN CONTENT ================= --}}
    <main class="max-w-7xl mx-auto px-4 py-6">
        @yield('content')
    </main>


    {{-- ================= FOOTER ================= --}}
    <footer class="bg-white border-t mt-10">
        <div class="max-w-7xl mx-auto px-4 py-6 text-center text-sm text-gray-500">
            © {{ date('Y') }} JobUpdate247. All rights reserved.
        </div>
    </footer>


    {{-- ================= MOBILE MENU SCRIPT ================= --}}
    <script>
        const btn = document.getElementById('menuBtn');
        const menu = document.getElementById('mobileMenu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>