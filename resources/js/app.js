// Цены на товары для калькулятора разового заказа
const COFFEE_PRICES = {
    'Эфиопия Иргачеффе': 32,
    'Колумбия Уила': 29,
    'Бразилия Серрадо': 26,
    'Дрип-пакеты': 18
};

// Хранилище текущего выбора для разового заказа
let currentOrder = {
    'Эфиопия Иргачеффе': 0,
    'Колумбия Уила': 0,
    'Бразилия Серрадо': 0,
    'Дрип-пакеты': 0
};

// 1. Главный обработчик смены типа интереса
window.handleInterestChange = function() {
    const interest = document.getElementById('interest').value;

    // ПРИНУДИТЕЛЬНО СБРАСЫВАЕМ ВСЕ ВИДИМЫЕ ОШИБКИ И УВЕДОМЛЕНИЯ ПРИ СМЕНЕ ИНТЕРЕСА
    document.querySelectorAll('[id^="error-"]').forEach(el => el.classList.add('hidden'));
    document.getElementById('form-message').classList.add('hidden');

    // Принудительно сбрасываем старые состояния при переключении
    resetOrderSelection();
    document.getElementById('sub-pack-1').value = 'none';
    document.getElementById('sub-pack-2').value = 'none';
    document.getElementById('hidden-product-field').value = '';

    // Скрываем все блоки по умолчанию
    document.getElementById('block-question').classList.add('hidden');
    document.getElementById('block-subscription').classList.add('hidden');
    document.getElementById('block-order').classList.add('hidden');
    document.getElementById('block-summary').classList.add('hidden');
    document.getElementById('price-display-wrapper').classList.add('invisible');

    // Меняем лейбл комментария
    const commentLabel = document.getElementById('comment-label');
    if (interest === 'question') {
        commentLabel.innerText = 'Ваш вопрос';
    } else {
        commentLabel.innerText = 'Комментарий';
    }

    // Включаем нужные блоки под выбранный тип
    if (interest === 'question') {
        document.getElementById('block-question').classList.remove('hidden');
    } else if (interest === 'subscription') {
        document.getElementById('block-subscription').classList.remove('hidden');
        document.getElementById('block-summary').classList.remove('hidden');
        calculateSubscription();
    } else if (interest === 'order') {
        document.getElementById('block-order').classList.remove('hidden');
        document.getElementById('block-summary').classList.remove('hidden');
        updateOrderSummaryOutput();
    }
};

// 2. Логика для Кофейной подписки
window.calculateSubscription = function() {
    const p1 = document.getElementById('sub-pack-1').value;
    const p2 = document.getElementById('sub-pack-2').value;
    const summaryItems = document.getElementById('summary-items');
    const priceWrapper = document.getElementById('price-display-wrapper');
    const priceValue = document.getElementById('total-price-value');

    if (p1 === 'none' && p2 === 'none') {
        summaryItems.innerHTML = '<span class="text-stone-600 italic">Ничего не выбрано</span>';
        priceWrapper.classList.add('invisible');
        return;
    }

    let itemsHtml = [];
    if (p1 !== 'none') itemsHtml.push(`1) ${p1}`);
    if (p2 !== 'none') itemsHtml.push(`2) ${p2}`);

    summaryItems.innerHTML = itemsHtml.join('<br>');

    // Фиксированная цена подписки
    priceValue.innerText = '54';
    priceWrapper.classList.remove('invisible');
};

// 3. Логика для Разового заказа
window.addCoffeeToOrder = function(sortName) {
    currentOrder[sortName]++;
    updateOrderSummaryOutput();
};

window.resetOrderSelection = function() {
    for (let key in currentOrder) {
        currentOrder[key] = 0;
    }
    updateOrderSummaryOutput();
};

function updateOrderSummaryOutput() {
    const summaryItems = document.getElementById('summary-items');
    const priceWrapper = document.getElementById('price-display-wrapper');
    const priceValue = document.getElementById('total-price-value');

    let itemsHtml = [];
    let totalPrice = 0;
    let index = 1;

    for (let sort in currentOrder) {
        if (currentOrder[sort] > 0) {
            itemsHtml.push(`${index}) ${sort} - ${currentOrder[sort]}`);
            totalPrice += COFFEE_PRICES[sort] * currentOrder[sort];
            index++;
        }
    }

    if (itemsHtml.length === 0) {
        summaryItems.innerHTML = '<span class="text-stone-600 italic">Ничего не выбрано</span>';
        priceWrapper.classList.add('invisible');
        return;
    }

    summaryItems.innerHTML = itemsHtml.join('<br>');
    priceValue.innerText = totalPrice+'';
    priceWrapper.classList.remove('invisible');
}

// 4. Глобальный клик по карточкам каталога на лендинге
window.selectProduct = function(type, productName) {
    const interestSelect = document.getElementById('interest');
    interestSelect.value = type;

    // Инициализируем смену блоков
    window.handleInterestChange();

    if (type === 'order') {
        // Если кликнули по дрипам или конкретному сорту зерна — добавляем 1 шт в калькулятор
        const targetKey = productName.includes('Дрип') ? 'Дрип-пакеты' : productName;
        if (currentOrder[targetKey] !== undefined) {
            currentOrder[targetKey] = 1;
            updateOrderSummaryOutput();
        }
    } else if (type === 'subscription') {
        // Если кликнули на подписку — предлагаем выбрать пачки
        document.getElementById('sub-pack-1').value = 'none';
        document.getElementById('sub-pack-2').value = 'none';
        calculateSubscription();
    }

    // Плавный переход к форме
    document.getElementById('order-form-section').scrollIntoView({ behavior: 'smooth' });
};

// 5. Принудительный сброс видамых ошибок и уведомлений при изменениях в форме
function setupDynamicErrorClearing() {
    const form = document.getElementById('order-form');
    const msgBlock = document.getElementById('form-message');

    // Вспомогательная функция для скрытия общей плашки успеха/ошибки
    const clearGlobalMessage = () => {
        if (msgBlock && !msgBlock.classList.contains('hidden')) {
            msgBlock.classList.add('hidden');
        }
    };

    // a. Слушаем ввод в текстовые поля (Имя, Телефон, Комментарий)
    form.querySelectorAll('input, textarea').forEach(element => {
        element.addEventListener('input', function() {
            clearGlobalMessage(); // Скрываем общую плашку при вводе текста

            const fieldName = this.getAttribute('name');
            const errorDiv = document.getElementById(`error-${fieldName}`);
            if (errorDiv) {
                errorDiv.classList.add('hidden'); // Прячем ошибку, как только юзер нажал хоть одну клавишу
            }
        });
    });

    // b. Слушаем изменения в выпадающих списках (Что вас интересует, пачки подписки)
    form.querySelectorAll('select').forEach(element => {
        element.addEventListener('change', function() {
            clearGlobalMessage(); // Скрываем общую плашку при изменении селекта

            const fieldName = this.getAttribute('name');
            const errorDiv = document.getElementById(`error-${fieldName}`);
            if (errorDiv) {
                errorDiv.classList.add('hidden'); // Прячем ошибку поля, если изменен выбор
            }

            // Специфический кейс: если изменили сорт или интерес, то потенциально исправили и ошибку "product/comment"
            document.getElementById('error-product')?.classList.add('hidden');
            document.getElementById('error-comment')?.classList.add('hidden');
        });
    });

    // c. Слушаем клики по кнопкам добавления кофе в разовом заказе
    // (Поскольку клик по кнопке меняет состав заказа, он также должен убирать ошибку отсутствия товара)
    const orderBlock = document.getElementById('block-order');
    if (orderBlock) {
        orderBlock.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('click', function() {
                clearGlobalMessage(); // Скрываем общую плашку при клике на кнопки "+" или "Сбросить"
                document.getElementById('error-product')?.classList.add('hidden');
            });
        });
    }
}

// Вызываем эту функцию один раз при загрузке страницы, чтобы активировать логику
document.addEventListener('DOMContentLoaded', function() {
    setupDynamicErrorClearing();
});

// 6. Сабмит формы и сбор данных перед отправкой
document.getElementById('order-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const interest = document.getElementById('interest').value;
    const hiddenProduct = document.getElementById('hidden-product-field');
    const submitBtn = document.getElementById('submit-btn');
    const msgBlock = document.getElementById('form-message');

    // Очищаем предыдущие ошибки
    document.querySelectorAll('[id^="error-"]').forEach(el => el.classList.add('hidden'));
    msgBlock.classList.add('hidden');

    // Сборка скрытого поля product непосредственно перед отправкой
    if (interest === 'subscription') {
        const p1 = document.getElementById('sub-pack-1').value;
        const p2 = document.getElementById('sub-pack-2').value;
        if (p1 === 'none' || p2 === 'none') {
            alert('Пожалуйста, выберите обе пачки кофе для подписки.');
            return;
        }
        hiddenProduct.value = `Выбор по подписке: 1) ${p1}; 2) ${p2}.`;
    } else if (interest === 'order') {
        let orderParts = [];
        let index = 1;
        for (let sort in currentOrder) {
            if (currentOrder[sort] > 0) {
                orderParts.push(`${index}) ${sort} - ${currentOrder[sort]}`);
                index++;
            }
        }
        if (orderParts.length === 0) {
            alert('Пожалуйста, добавьте хотя бы одну пачку кофе в заказ.');
            return;
        }
        hiddenProduct.value = `Выбор при заказе: ${orderParts.join('; ')}.`;
    }

    // Собираем все данные для передачи в JSON
    const formData = {
        name: document.getElementById('name').value,
        phone: document.getElementById('phone').value,
        interest: interest,
        product: hiddenProduct.value,
        comment: document.getElementById('comment').value,
        mid_name: document.getElementById('mid_name').value,
        // Извлекаем UTM-метки из строки браузера (дополнительный плюс по ТЗ)
        utm_source: new URLSearchParams(window.location.search).get('utm_source'),
        utm_medium: new URLSearchParams(window.location.search).get('utm_medium'),
        utm_campaign: new URLSearchParams(window.location.search).get('utm_campaign'),
        utm_content: new URLSearchParams(window.location.search).get('utm_content'),
        referrer: document.referrer
    };

    // Блокируем кнопку (защита от Double Click по ТЗ)
    submitBtn.disabled = true;
    submitBtn.innerText = 'Отправка...';

    // Отправка запроса на созданный нами Laravel API роут
    fetch('/api/lead', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(formData)
    })
        .then(response => response.json().then(data => ({ status: response.status, body: data })))
        .then(res => {
            if (res.status === 201) {
                // Успех

                // очистка формы
                document.getElementById('order-form').reset();
                resetOrderSelection();

                // переключение вкладок
                handleInterestChange();

                // плашка успеха
                msgBlock.className = "mb-6 p-4 rounded-xl text-sm font-medium text-center bg-emerald-500/10 border border-emerald-500/20 text-emerald-400";
                msgBlock.innerText = res.body.message;
                // делаем видимой
                msgBlock.classList.remove('hidden');

                // возврат кнопки в рабочее состояние
                submitBtn.disabled = false;
                submitBtn.innerText = 'Отправить заявку';

                // скролл к сообщению
                msgBlock.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } else if (res.status === 422 && res.body.errors) {
                // Ошибки валидации Laravel
                for (let field in res.body.errors) {
                    const errDiv = document.getElementById(`error-${field}`);
                    if (errDiv) {
                        errDiv.innerText = res.body.errors[field][0];
                        errDiv.classList.remove('hidden');
                    }
                }
                submitBtn.disabled = false;
                submitBtn.innerText = 'Отправить заявку';
            } else {
                // Ошибка дедупликации (10 минут) или лимитера
                msgBlock.className = "mb-6 p-4 rounded-xl text-sm font-medium text-center bg-red-500/10 border border-red-500/20 text-red-400";
                msgBlock.innerText = res.body.message || 'Произошла непредвиденная ошибка.';
                msgBlock.classList.remove('hidden');
                submitBtn.disabled = false;
                submitBtn.innerText = 'Отправить заявку';
            }
        })
        .catch(error => {
            msgBlock.className = "mb-6 p-4 rounded-xl text-sm font-medium text-center bg-red-500/10 border border-red-500/20 text-red-400";
            msgBlock.innerText = 'Не удалось отправить заявку. Проверьте подключение и попробуйте ещё раз.';
            msgBlock.classList.remove('hidden');
            submitBtn.disabled = false;
            submitBtn.innerText = 'Отправить заявку';
        });
});

// Логика кнопки "Наверх"
window.addEventListener('scroll', function() {
    const scrollTopBtn = document.getElementById('scroll-to-top');
    if (!scrollTopBtn) return;

    // Появляется, если прокрутили ниже высоты первого экрана (окна браузера)
    if (window.scrollY > window.innerHeight * 1.1) {
        scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
        scrollTopBtn.classList.add('opacity-100', 'translate-y-0');
    } else {
        scrollTopBtn.classList.remove('opacity-100', 'translate-y-0');
        scrollTopBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
    }
});

// Функция плавного скролла на самый верх страницы
window.scrollToTop = function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};
