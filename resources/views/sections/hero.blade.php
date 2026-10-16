<section class="relative min-h-screen flex items-center justify-center bg-[#120d0a] text-stone-100 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/kvarta_coffee_main_3.jpg') }}"
             alt="Свежеобжаренные кофейные зерна Кварта"
             class="w-full h-full object-cover object-center opacity-50 select-none pointer-events-none">
        <div class="absolute inset-0 bg-linear-to-t from-[#120d0a] via-[#120d0a]/40 to-[#120d0a]/30"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4 max-w-4xl text-center flex flex-col items-center">
        <div class="w-full sm:w-auto mb-8 tracking-[0.2em] sm:tracking-[0.3em] text-xs sm:text-sm md:text-base font-bold uppercase text-[#df974f] bg-[#211814]/70 px-4 sm:px-8 py-3 sm:py-2.5 rounded-xl sm:rounded-full border border-[#df974f]/20 backdrop-blur-md shadow-xl flex items-center justify-center space-x-2 sm:space-x-3">
            <span class="text-sm sm:text-base md:text-lg">☕</span>
            <span class="font-display">КВАРТА • Мастерская кофе</span>
        </div>

        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black font-display tracking-tight leading-[1.15] mb-6 balance text-white">
            Обжариваем кофе <br/><span class="text-[#df974f]">по четвергам</span>
            <br/>
            Привозим вам домой <br/><span class="text-[#df974f]">в пятницу</span>
        </h1>

        <p class="text-base sm:text-lg md:text-xl text-stone-300 max-w-2xl mb-12 leading-relaxed font-light balance">
            Мы не храним зерно на складах месяцами. <br/>Вы получаете кофе на
            <strong class="font-medium text-[#df974f]">1–3 день после обжарки</strong>,
            когда его вкус и аромат раскрываются на максимум. <br/>Доставка по Минску.
        </p>

        <div class="flex flex-col sm:flex-row flex-wrap items-center justify-center gap-4 w-full sm:w-auto max-w-3xl">
            <a href="#catalog"
               class="w-full sm:w-auto px-8 py-4 bg-[#df974f] hover:bg-[#e7a662] active:bg-[#c37e38] text-zinc-950 font-bold rounded-xl shadow-lg shadow-[#df974f]/10 transition-all duration-200 ease-in-out text-center tracking-wide transform hover:-translate-y-0.5 font-display">
                Выбрать кофе
            </a>

            <a href="#subscription"
               class="w-full sm:w-auto px-6 py-4 bg-[#211814]/80 hover:bg-[#2d201a] active:bg-[#120d0a] text-stone-200 hover:text-white font-medium rounded-xl border border-[#df974f]/30 backdrop-blur-sm transition-all duration-200 ease-in-out text-center tracking-wide text-sm whitespace-nowrap cursor-pointer">
                Подписка на кофе
            </a>

            <a href="#order-form-section"
               class="w-full sm:w-auto px-8 py-4 bg-stone-800/80 hover:bg-stone-700/90 active:bg-stone-900 text-stone-200 hover:text-white font-medium rounded-xl border border-stone-700/50 backdrop-blur-sm transition-all duration-200 ease-in-out text-center tracking-wide">
                Быстрый заказ
            </a>
        </div>
    </div>
</section>
