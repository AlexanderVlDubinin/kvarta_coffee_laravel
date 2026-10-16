<!DOCTYPE html>
<html lang="ru" class="scroll-smooth bg-[#120d0a] antialiased selection:bg-[#d48c46]/30 selection:text-[#e9a65a]">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>@yield('title', 'КВАРТА — Мастерская свежеобжаренного кофе в Минске')</title>

        <!-- Мета-теги для превью в мессенджерах (Open Graph) — жирный плюс в ТЗ -->
        <meta name="description" content="Обжариваем кофе по четвергам, развозим по Минску в пятницу. Получите зерно на следующий день после ростера на пике вкуса!">
        <meta property="og:type" content="website">
        <meta property="og:title" content="КВАРТА — Мастерская кофе">
        <meta property="og:description" content="Свежий обжар партиями по 5 кг. Упаковка и доставка прямо к вам домой или в офис.">
        <meta property="og:image" content="{{ url(asset('images/kvarta_coffee_main_2.jpg')) }}">
        <meta property="og:url" content="{{ url()->current() }}">

        <!-- Подключение современного шрифта Geist или Inter (через Google Fonts) -->
        <link rel="preconnect" href="https://googleapis.com">
        <link rel="preconnect" href="https://gstatic.com" crossorigin>
        <link href="https://googleapis.com/css2?family=Geist:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Geist', sans-serif;
            }

            button, a {
                -webkit-tap-highlight-color: transparent;
            }

            .balance {
                text-wrap: balance;
            }
        </style>
    </head>
    <body class="min-h-screen text-zinc-100 flex flex-col justify-between">

    <main class="grow">
        @yield('content')
    </main>

    <footer class="bg-[#0b0806] border-t border-[#1c1410] py-8 text-stone-500 text-xs sm:text-sm">
        <div class="container mx-auto px-4 max-w-4xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-center sm:text-left">
                <p class="font-medium text-stone-400">© {{ date('Y') }} КВАРТА • Мастерская кофе</p>
                <p class="mt-1 text-stone-500">Минск, ул. Короля, 9 (самовывоз)</p>
            </div>

            <div class="text-center font-medium text-stone-300">
                <a href="tel:+375291234567" class="hover:text-[#df974f] transition-colors duration-200 text-sm sm:text-base tracking-wide flex items-center justify-center gap-1.5">
                    <span>📞</span>
                    <span>+375 (29) 123-45-67</span>
                </a>
            </div>

            <div class="text-center sm:text-right">
                <p class="text-stone-400">Будни: 8:00–20:00 | Выходные: 10:00–18:00</p>
                <p class="mt-1 text-[#df974f]/70 italic">Свежесть — главное, что мы продаем.</p>
            </div>

        </div>
    </footer>
    </body>
</html>
