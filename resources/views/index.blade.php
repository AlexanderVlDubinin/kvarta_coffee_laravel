@extends('layouts.app')

@section('content')

    <!-- Главный экран -->
    @include('sections.hero')

    <!-- Основатели и история -->
    @include('sections.story')

    <!-- РАЗДЕЛИТЕЛЬ: Плавный переход от более светлого к более темному  -->
    <div class="h-28 sm:h-44 bg-linear-to-b from-[#211814] to-transparent -mb-28 sm:-mb-44 relative z-10 pointer-events-none"></div>

    <!-- Каталог сортов кофе -->
    @include('sections.catalog')

    <!-- РАЗДЕЛИТЕЛЬ: Плавный переход от более темного к более светлому фону -->
    <div class="h-28 sm:h-44 bg-linear-to-b from-[#120d0a] to-transparent -mb-28 sm:-mb-44 relative z-10 pointer-events-none"></div>

    <!-- Кофейная подписка -->
    @include('sections.subscription')

    <!-- РАЗДЕЛИТЕЛЬ: Плавный переход от более светлого к более темному  -->
    <div class="h-28 sm:h-44 bg-linear-to-b from-[#211814] to-transparent -mb-28 sm:-mb-44 relative z-10 pointer-events-none"></div>

    <!-- Доставка, самовывоз (адрес, время работы) -->
    @include('sections.contacts')

    <!-- РАЗДЕЛИТЕЛЬ: Плавный переход от более темного к более светлому фону -->
    <div class="h-28 sm:h-44 bg-linear-to-b from-[#120d0a] to-transparent -mb-28 sm:-mb-44 relative z-10 pointer-events-none"></div>

    <!-- Форма заказа -->
    @include('sections.order_form')

    <!-- Кнопка "Наверх" -->
    @include('sections.scroll_top')

@endsection
