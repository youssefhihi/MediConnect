<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        <!-- JavaScript to Toggle Specialties Select Box -->
<script>
    function toggleSpecialties() {
        var role = document.querySelector('input[name="role"]:checked').value;
        var specialties = document.getElementById('specialties');

        if (role === 'doctor') {
            specialties.classList.remove('hidden');
        } else {
            specialties.classList.add('hidden');
        }
    }
        function toggleBirthday() {
            var role = document.querySelector('input[name="role"]:checked').value;
            var birthday = document.getElementById('birthday');

            if (role === 'patient') {
                birthday.classList.remove('hidden');
            } else {
                birthday.classList.add('hidden');
            }
        }
      // Call toggleBirthday function when role selection changes
document.querySelectorAll('input[name="role"]').forEach(function (radio) {
    radio.addEventListener('change', toggleBirthday);
});
document.querySelectorAll('input[name="role"]').forEach(function (radio) {
    radio.addEventListener('change', toggleSpecialties);
});
</script>
    </body>
</html>
