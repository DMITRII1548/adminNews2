@extends('layouts.main')
@section('content')
<main class="main" style="background: {{ \App\Models\PageColor::first()->main }};">
    <section class="heading">
        <a href="{{ route('news.show', $trend->id) }}"><img src="{{ $trend->imageUrl }}" alt="" class="heading__img"></a>
        <div class="heading__info" style="width: 100%">
            <div class="heading__top">
                <h5>Trending</h5>
                <div class="heading__icons">
                    <img onclick="addLike({{ $trend->id }})" src="{{ asset('/imgs/card/like.svg') }}" id="like-img-{{ $trend->id }}">
                    <img src="{{ asset('/imgs/card/repost.svg') }}" alt="Поделиться">
                    <img src="{{ asset('/imgs/card/save.svg') }}" alt="Заметки">
                </div>
            </div>
            <div class="heading__middle">
                <h1>{{ $trend->title }}</a></h1>
                <img id="like-img-{{ $trend->id }}" src="{{ asset('/imgs/card/imgs/main.jpg') }}" alt="" class="heading__img--mobile">
                <p class="heading__text">
                   {{ $trend->description }}
                </p>
            </div>
            <div class="heading__bottom">
                <span class="heading__publish-date">
                    {{ $trend->date }}
                </span>
                <span class="heading__author">
                    {{ $trend->author_name }}
                </span>
            </div>
        </div>
    </section>
    <section class="error-alert">
        <button class="error-alert__btn">Breaking News</button>
        <h3 class="error-alert__title">
            Kanye West says he's running for president in 2020.
        </h3>
    </section>
    <section class="cards">
        <div class="cards__nav">
            <h3 class="cards__title">News</h3>
            <img src="{{ asset('/imgs/card/nav.svg') }}" alt="Навигация" class="cards__nav-img">
        </div>
        <div class="cards__wrapper" style="gap: 10px">
            @foreach ($news as $n)
                <div class="card">
                    <a href="{{ route('news.show', $n->id) }}"><img src="{{ $n->imageUrl }}" alt="Card" class="card__img"></a>
                    <div class="card__wrapper">
                        <h4 class="card__title">{{ $n->title }}</h4>
                        <p class="card__text">{{ $n->description }}</p>
                        <div class="card__info">
                            <span>{{ $n->date }}</span>
                            <span>By {{ $n->author_name }}</span>
                        </div>
                        <ul class="card__actions">
                            <li class="card__action">
                                <img onclick="addLike({{ $n->id }})" src="{{ asset('/imgs/card/like.svg') }}" alt="Like" id="like-img-{{ $n->id }}">
                                <span class="card__count" id="news-content-{{ $n->id }}" id="like-{{ $n->id }}">{{ $n->likes }}</span>
                            </li>
                            <li class="card__action" id="share">
                                <img src="{{ asset('/imgs/card/repost.svg') }}" alt="Поделиться">
                                <span class="card__count">{{ $n->reposts }}</span>
                            </li>
                            <li class="card__action">
                                <img src="{{ asset('/imgs/card/save.svg') }}" alt="Сохранить">
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <button class="cards__btn">
            View More
        </button> --}}
    </section>
    <section class="slider">
        <div class="slider__title">
            <h4>Editor’s Picks</h4>
            <img src="{{ asset('/imgs/card/star.svg') }}" alt="Звезда">
        </div>
        <div class="slider__wrapper">
            <div class="slider__items">
                @foreach ($lastUpdated as $item)
                    <a href="{{ route('news.show', $item->id) }}" class="slider-card">
                        <img src="{{ $item->imageUrl }}" alt="" class="slider-card__img">
                    </a>
                        <h5 class="slider-card__title--mobile">
                           {{ $item->title }}
                        </h5>
                        <div class="slider-card__wrapper">
                            <h4 class="slider-card__title">{{ $item->title }}</h4>
                            <p class="slider-card__text">
                                {{ $item->description }}
                            </p>
                        </div>
                @endforeach

            </div>
            <nav class="slider__nav">
                <svg xmlns="http://www.w3.org/2000/svg" width="121" height="4" viewBox="0 0 121 4" fill="none">
                    <path opacity="0.2" d="M0 0H15V4H0V0Z" fill="#EE6400"/>
                    <path d="M32 0H57V4H32V0Z" fill="#EE6400"/>
                    <path opacity="0.2" d="M74 0H89V4H74V0Z" fill="#EE6400"/>
                    <path opacity="0.2" d="M106 0H121V4H106V0Z" fill="#EE6400"/>
                </svg>
            </nav>


        </div>
    </section>
</main>
@endsection
