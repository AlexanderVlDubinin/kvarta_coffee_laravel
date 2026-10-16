@extends('layouts.app')

@section('content')

    <!-- Главный экран -->
    @include('sections.hero')

    <!-- Основатели и история -->
    @include('sections.story')

    <!-- Каталог сортов кофе -->
    @include('sections.catalog')

    <!-- Кофейная подписка -->
    @include('sections.subscription')

    <!-- Доставка, самовывоз (адрес, время работы) -->
    @include('sections.contacts')

    <!-- Форма заказа -->
    @include('sections.order_form')

@endsection
