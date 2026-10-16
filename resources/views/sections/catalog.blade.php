<section id="catalog" class="py-20 sm:py-28 bg-[#120d0a] text-stone-200 border-t border-[#1c1410]">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-2">
            <span class="text-xl! sm:text-sm font-bold tracking-widest text-[#df974f] uppercase">Свежий обжар</span>
            <h2 class="text-3xl sm:text-4xl font-black font-display tracking-tight text-white balance">
                Зерно, которое мы предлагаем
            </h2>
            <p class="text-sm sm:text-base text-stone-400 font-light balance">
                Выберите сорт, нажмите на кнопку, и система автоматически подготовит форму заказа внизу страницы.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Эфиопия -->
            <div class="bg-[#211814]/40 border border-[#3d2c24]/40 rounded-3xl p-6 flex flex-col justify-between shadow-xl hover:border-[#df974f]/30 transition-all duration-300">
                <div class="space-y-5">
                    <div class="relative aspect-square rounded-2xl overflow-hidden bg-[#120d0a] border border-[#3d2c24]/20 flex items-center justify-center p-4">
                        <img src="{{ asset('images/ethiopian_yirgacheffe_coffee_pouch.jpg') }}"
                             alt="Кофе Эфиопия Иргачеффе"
                             class="max-h-full object-contain select-none pointer-events-none">
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-xl font-bold font-display text-white tracking-tight">Эфиопия Иргачеффе</h3>
                        <div class="my-2 text-xs font-semibold text-[#df974f] tracking-wide uppercase">
                            <span class="text-[10px] font-semibold uppercase tracking-wider bg-[#df974f]/10 text-[#df974f] border border-[#df974f]/20 px-2 py-0.5 rounded-md whitespace-nowrap">
                                Обжарка: Светлая
                            </span>
                        </div>
                        <p class="text-xs text-stone-400 font-medium pt-0.5">Зерно, 250 г</p>
                    </div>

                    <div class="bg-[#120d0a]/50 rounded-xl p-3.5 space-y-2 text-xs font-mono">
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Кислинка:</span>
                            <span class="text-[#df974f]">●●●●● 🔥</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Горчинка:</span>
                            <span class="text-stone-600">●<span class="text-stone-800">○○○○&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Плотность:</span>
                            <span class="text-stone-400">●●<span class="text-stone-800">○○○&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Сладость:</span>
                            <span class="text-stone-400">●●●<span class="text-stone-800">○○&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                    </div>

                    <p class="text-sm text-stone-300 leading-relaxed font-light text-justify">
                        Настоящая классика для любителей легкого и изысканного кофе. Этот сорт напоминает дорогой бергамотовый чай с букетом свежих весенних цветов. Во вкусе раскрывается приятная цитрусовая кислинка и нежное сладкое послевкусие.
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-[#3d2c24]/30 flex items-center justify-between gap-4">
                    <div class="font-display">
                        <span class="text-2xl font-black text-white">32</span>
                        <span class="text-xs text-stone-400 ml-0.5">BYN</span>
                    </div>
                    <button onclick="selectProduct('order', 'Эфиопия Иргачеффе')"
                            class="px-5 py-2.5 bg-[#df974f] hover:bg-[#e7a662] active:bg-[#c37e38] text-zinc-950 font-bold text-xs rounded-xl transition-all duration-200 shadow-md font-display cursor-pointer">
                        Хочу этот кофе
                    </button>
                </div>
            </div>

            <!-- Колумбия -->
            <div class="bg-[#211814]/40 border border-[#3d2c24]/40 rounded-3xl p-6 flex flex-col justify-between shadow-xl hover:border-[#df974f]/30 transition-all duration-300">
                <div class="space-y-5">
                    <div class="relative aspect-square rounded-2xl overflow-hidden bg-[#120d0a] border border-[#3d2c24]/20 flex items-center justify-center p-4">
                        <img src="{{ asset('images/colombia_huila_coffee_pouch.jpg') }}"
                             alt="Кофе Колумбия Уила"
                             class="max-h-full object-contain select-none pointer-events-none">
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-xl font-bold font-display text-white tracking-tight">Колумбия Уила</h3>
                        <div class="my-2 text-xs font-semibold text-[#df974f] tracking-wide uppercase">
                            <span class="text-[10px] font-semibold uppercase tracking-wider bg-[#df974f]/10 text-[#df974f] border border-[#df974f]/20 px-2 py-0.5 rounded-md whitespace-nowrap">
                                Обжарка: Средняя
                            </span>
                        </div>
                        <p class="text-xs text-stone-400 font-medium pt-0.5">Зерно, 250 г</p>
                    </div>

                    <div class="bg-[#120d0a]/50 rounded-xl p-3.5 space-y-2 text-xs font-mono">
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Кислинка:</span>
                            <span class="text-stone-400">●●●<span class="text-stone-800">○○&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Горчинка:</span>
                            <span class="text-stone-400">●●<span class="text-stone-800">○○○&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Плотность:</span>
                            <span class="text-stone-400">●●●<span class="text-stone-800">○○&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Сладость:</span>
                            <span class="text-[#df974f]">●●●●<span class="text-stone-800">○</span> 🔥</span>
                        </div>
                    </div>

                    <p class="text-sm text-stone-300 leading-relaxed font-light text-justify">
                        Сбалансированный и невероятно уютный сорт с идеальным балансом сладости и фруктовой кислинки. Сочное красное яблоко в первом глотке плавно переходит в тягучую карамельную сладость. Этот кофе оставляет долгое и согревающее послевкусие.
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-[#3d2c24]/30 flex items-center justify-between gap-4">
                    <div class="font-display">
                        <span class="text-2xl font-black text-white">29</span>
                        <span class="text-xs text-stone-400 ml-0.5">BYN</span>
                    </div>
                    <button onclick="selectProduct('order', 'Колумбия Уила')"
                            class="px-5 py-2.5 bg-[#df974f] hover:bg-[#e7a662] active:bg-[#c37e38] text-zinc-950 font-bold text-xs rounded-xl transition-all duration-200 shadow-md font-display cursor-pointer">
                        Хочу этот кофе
                    </button>
                </div>
            </div>

            <!-- Бразилия -->
            <div class="bg-[#211814]/40 border border-[#3d2c24]/40 rounded-3xl p-6 flex flex-col justify-between shadow-xl hover:border-[#df974f]/30 transition-all duration-300">
                <div class="space-y-5">
                    <div class="relative aspect-square rounded-2xl overflow-hidden bg-[#120d0a] border border-[#3d2c24]/20 flex items-center justify-center p-4">
                        <img src="{{ asset('images/brazil_cerrado_coffee_pouch.jpg') }}"
                             alt="Кофе Бразилия Серрадо"
                             class="max-h-full object-contain select-none pointer-events-none">
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-xl font-bold font-display text-white tracking-tight">Бразилия Серрадо</h3>
                        <div class="my-2 text-xs font-semibold text-[#df974f] tracking-wide uppercase">
                            <span class="text-[10px] font-semibold uppercase tracking-wider bg-[#df974f]/10 text-[#df974f] border border-[#df974f]/20 px-2 py-0.5 rounded-md whitespace-nowrap">
                                Обжарка: Под эспрессо
                            </span>
                        </div>
                        <p class="text-xs text-stone-400 font-medium pt-0.5">Зерно, 250 г</p>
                    </div>

                    <div class="bg-[#120d0a]/50 rounded-xl p-3.5 space-y-2 text-xs font-mono">
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Кислинка:</span>
                            <span class="text-stone-600">●<span class="text-stone-800">○○○○&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Горчинка:</span>
                            <span class="text-[#df974f]">●●●●<span class="text-stone-800">○</span> 🔥</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Плотность:</span>
                            <span class="text-[#df974f]">●●●●● 🔥</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-stone-400">Сладость:</span>
                            <span class="text-stone-400">●●●<span class="text-stone-800">○○&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                    </div>

                    <p class="text-sm text-stone-300 leading-relaxed font-light text-justify">
                        Плотный, понятный и классический вкус без лишней кислотности. В основе профиля — благородная горчинка темного шоколада и насыщенные ореховые ноты. Отлично раскрывается как в черном виде, так и с молоком.
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-[#3d2c24]/30 flex items-center justify-between gap-4">
                    <div class="font-display">
                        <span class="text-2xl font-black text-white">26</span>
                        <span class="text-xs text-stone-400 ml-0.5">BYN</span>
                    </div>
                    <button onclick="selectProduct('order', 'Бразилия Серрадо')"
                            class="px-5 py-2.5 bg-[#df974f] hover:bg-[#e7a662] active:bg-[#c37e38] text-zinc-950 font-bold text-xs rounded-xl transition-all duration-200 shadow-md font-display cursor-pointer">
                        Хочу этот кофе
                    </button>
                </div>
            </div>
        </div>

        <!-- Дрип-пакеты -->
        <div class="bg-[#211814]/40 border border-[#3d2c24]/40 rounded-3xl p-6 sm:p-8 shadow-xl hover:border-[#df974f]/30 transition-all duration-300">
            <div class="flex flex-col md:flex-row items-center gap-6 sm:gap-8">
                <div class="w-full md:w-1/3 aspect-4/3 md:aspect-square rounded-2xl overflow-hidden bg-[#120d0a] border border-[#3d2c24]/20 flex items-center justify-center p-6 shrink-0">
                    <img src="{{ asset('images/coffee_drip_bag_collection.jpg') }}"
                         alt="Коробка дрип-пакетов ассорти"
                         class="max-h-full object-contain select-none pointer-events-none">
                </div>

                <div class="w-full md:w-2/3 flex flex-col justify-between h-full space-y-4">
                    <div class="space-y-2">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-2xl font-bold font-display text-white">Дрип-пакеты (Ассорти)</h3>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded-md">
                                Популярно
                            </span>
                        </div>
                        <p class="text-xs text-stone-400 font-medium">10 штук в коробке</p>
                        <p class="text-sm sm:text-base text-stone-300 leading-relaxed font-light text-justify pt-1">
                            Наш кофе в удобном формате. Нужна только горячая вода и кружка. Внутри собран микс из Эфиопии, Колумбии и Бразилии — позовите свежий кофе с собой в дорогу, путешествие или офис.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-[#3d2c24]/30 flex items-center justify-between gap-4">
                        <div class="font-display">
                            <span class="text-3xl font-black text-white">18</span>
                            <span class="text-xs text-stone-400 ml-0.5">BYN</span>
                        </div>
                        <button onclick="selectProduct('order', 'Дрип-пакеты (Ассорти)')"
                                class="px-6 py-3 bg-[#df974f] hover:bg-[#e7a662] active:bg-[#c37e38] text-zinc-950 font-bold text-sm rounded-xl transition-all duration-200 shadow-md font-display cursor-pointer">
                            Хочу дрипы
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
