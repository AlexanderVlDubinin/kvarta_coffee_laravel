<section id="order-form-section" class="py-20 sm:py-28 bg-[#1c1410] text-stone-200 border-t border-[#2e221c]">
    <div class="container mx-auto px-4 max-w-2xl">
        <div class="text-center mb-12 space-y-2">
            <span class="text-xl! sm:text-sm font-bold tracking-widest text-[#df974f] uppercase block">Оформление</span>
            <h2 class="text-3xl sm:text-4xl font-black font-display tracking-tight text-white">Оставьте заявку</h2>
            <p class="text-sm text-stone-400 font-light balance">
                Онлайн-оплаты на сайте нет. Вы просто заполняете форму, а мы перезваниваем вам, уточняем сорт кофе, удобное время доставки, прочие детали и подтверждаем заказ.
            </p>
        </div>

        <!-- Form System Notifications -->
        <div id="form-message" class="hidden mb-6 p-4 rounded-xl text-sm font-medium text-center"></div>

        <form id="order-form" class="space-y-6 bg-[#120d0a]/60 border border-[#3d2c24]/50 p-6 sm:p-10 rounded-3xl shadow-2xl backdrop-blur-sm">
            <!-- Hidden fields -->
            <input type="hidden" name="product" id="hidden-product-field">
            <input type="text" name="mid_name" id="mid_name" style="display: none;" tabindex="-1" autocomplete="off">

            <div class="space-y-1.5">
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-stone-400">Ваше имя</label>
                <input type="text" id="name" name="name" required placeholder="Дмитрий"
                       class="w-full px-4 py-3 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-stone-100 placeholder-stone-600 focus:outline-none focus:border-[#df974f] focus:ring-1 focus:ring-[#df974f] transition-all text-sm">
                <div id="error-name" class="text-xs text-red-400 hidden pt-1"></div>
            </div>

            <div class="space-y-1.5">
                <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-stone-400">Телефон</label>
                <input type="tel" id="phone" name="phone" required placeholder="+375(XX)XXX-XX-XX"
                       class="w-full px-4 py-3 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-stone-100 placeholder-stone-600 focus:outline-none focus:border-[#df974f] focus:ring-1 focus:ring-[#df974f] transition-all text-sm">
                <p class="text-[11px] text-stone-500 font-light">Пожалуйста, введите корректный белорусский номер телефона в формате +375(XX)XXX-XX-XX.</p>
                <div id="error-phone" class="text-xs text-red-400 hidden pt-1"></div>
            </div>

            <div class="space-y-1.5">
                <label for="interest" class="block text-xs font-semibold uppercase tracking-wider text-stone-400">Что вас интересует?</label>
                <select id="interest" name="interest" required onchange="handleInterestChange()"
                        class="w-full px-4 py-3 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-stone-100 focus:outline-none focus:border-[#df974f] transition-all text-sm cursor-pointer">
                    <option value="none" selected>Сделайте выбор</option>
                    <option value="order">Разовый заказ кофе</option>
                    <option value="subscription">Кофейная подписка</option>
                    <option value="question">У меня есть вопрос</option>
                </select>
                <div id="error-interest" class="text-xs text-red-400 hidden pt-1"></div>
            </div>

            <!-- DYNAMIC BLOCK 1: I have a question -->
            <div id="block-question" class="hidden p-3.5 bg-[#df974f]/5 border border-[#df974f]/20 rounded-xl text-xs sm:text-sm text-[#df974f]/90 font-light">
                ℹ️ Напишите ваш вопрос в комментарии, и мы вам перезвоним и ответим.
            </div>

            <!-- DYNAMIC BLOCK 2: Coffee Subscription -->
            <div id="block-subscription" class="hidden space-y-4 p-4 bg-[#211814]/30 border border-[#3d2c24]/40 rounded-2xl">
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-400">Выберите 2 пачки кофе для подписки:</label>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <select id="sub-pack-1" onchange="calculateSubscription()" class="w-full px-3 py-2.5 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-xs focus:outline-none focus:border-[#df974f] text-stone-300">
                        <option value="none">Выберите 1-ю пачку</option>
                        <option value="Эфиопия Иргачеффе">Эфиопия Иргачеффе</option>
                        <option value="Колумбия Уила">Колумбия Уила</option>
                        <option value="Бразилия Серрадо">Бразилия Серрадо</option>
                    </select>

                    <select id="sub-pack-2" onchange="calculateSubscription()" class="w-full px-3 py-2.5 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-xs focus:outline-none focus:border-[#df974f] text-stone-300">
                        <option value="none">Выберите 2-ю пачку</option>
                        <option value="Эфиопия Иргачеффе">Эфиопия Иргачеффе</option>
                        <option value="Колумбия Уила">Колумбия Уила</option>
                        <option value="Бразилия Серрадо">Бразилия Серрадо</option>
                    </select>
                </div>
            </div>

            <!-- DYNAMIC BLOCK 3: One-time order -->
            <div id="block-order" class="hidden space-y-4 p-4 bg-[#211814]/30 border border-[#3d2c24]/40 rounded-2xl">
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-400">Выберите кофе:</label>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                    <button type="button" onclick="addCoffeeToOrder('Эфиопия Иргачеффе')" class="px-3 py-2.5 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-left hover:border-[#df974f] text-stone-300 transition-colors cursor-pointer">+ Эфиопия Иргачеффе</button>
                    <button type="button" onclick="addCoffeeToOrder('Колумбия Уила')" class="px-3 py-2.5 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-left hover:border-[#df974f] text-stone-300 transition-colors cursor-pointer">+ Колумбия Уила</button>
                    <button type="button" onclick="addCoffeeToOrder('Бразилия Серрадо')" class="px-3 py-2.5 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-left hover:border-[#df974f] text-stone-300 transition-colors cursor-pointer">+ Бразилия Серрадо</button>
                    <button type="button" onclick="addCoffeeToOrder('Дрип-пакеты')" class="px-3 py-2.5 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-left hover:border-[#df974f] text-stone-300 transition-colors cursor-pointer">+ Дрип-пакеты</button>
                </div>

                <button type="button" onclick="resetOrderSelection()" class="w-full py-2 bg-stone-800 hover:bg-stone-700 text-stone-400 hover:text-white rounded-xl text-xs font-medium transition-colors border border-stone-700/40 cursor-pointer">
                    ❌ Сбросить выбор кофе
                </button>
            </div>

            <!-- TOTAL TOTAL BLOCK (Shown only for Orders and Subscriptions) -->
            <div id="block-summary" class="hidden p-4 bg-[#120d0a] border border-[#3d2c24] rounded-2xl space-y-2">
                <div class="text-xs font-semibold uppercase tracking-wider text-stone-500">Ваш итоговый выбор:</div>
                <div id="summary-items" class="text-sm font-light text-stone-300 space-y-1">
                    Ничего не выбрано
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="comment" id="comment-label" class="block text-xs font-semibold uppercase tracking-wider text-stone-400">Комментарий</label>
                <textarea id="comment" name="comment" rows="3" placeholder="Например: 'Хочу Колумбию под фильтр' или 'Позвоните мне после 18:00'"
                          class="w-full px-4 py-3 bg-[#120d0a] border border-[#3d2c24] rounded-xl text-stone-100 placeholder-stone-600 focus:outline-none focus:border-[#df974f] text-sm resize-none transition-all"></textarea>
                <div id="error-comment" class="text-xs text-red-400 hidden pt-1"></div>
            </div>

            <div class="pt-4 border-t border-[#3d2c24]/40 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div id="price-display-wrapper" class="invisible font-display text-center sm:text-left">
                    <span class="text-xs text-stone-500 uppercase block tracking-wider font-sans font-medium">Итоговая цена</span>
                    <span class="text-3xl font-black text-white" id="total-price-value">0</span>
                    <span class="text-sm font-bold text-stone-400 ml-0.5">BYN</span>
                </div>

                <button type="submit" id="submit-btn"
                        class="w-full sm:w-auto px-8 py-4 bg-[#df974f] hover:bg-[#e7a662] active:bg-[#c37e38] disabled:bg-stone-800 disabled:text-stone-600 disabled:transform-none disabled:cursor-not-allowed text-zinc-950 font-bold rounded-xl shadow-lg transition-all duration-200 tracking-wide font-display text-center cursor-pointer transform hover:-translate-y-0.5">
                    Отправить заявку
                </button>
            </div>

        </form>
    </div>
</section>
