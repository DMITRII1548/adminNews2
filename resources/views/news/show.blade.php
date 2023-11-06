@extends('layouts.main')
@section('content')
<main class="main" style="background: #F7F4F4;">
    <section class="preview" style="background: #0E1E32;">
        <h1 class="preview__title">
            {{ $news->title }}
        </h1>
    </section>
    <section class="preview-img">
        <img src="{{ $news->imageUrl }}" alt="{{ $news->title }}" class="preview-img__img">
    </section>
    <div class="wrapper-show">
        <aside class="aside-actions">
            <div class="aside-actions__info">
                <h6 class="aside-actions__title">See more like this?</h6>
                <img src="{{ asset('imgs/article/green-red') }}.svg" alt="" class="aside-actions__img">
            </div>

            <ul class="aside-actions__list">
                <li class="aside-actions__item"><img onclick="addLike({{ $news->id }})" src="{{ asset('imgs/card/like-active.svg') }}" alt="Like" id="like-img-{{ $news->id }}"> <span>{{ $news->likes }}</span></li>
                <li class="aside-actions__item"><img src="{{ asset('imgs/article/comments.svg') }}" alt="Comments"> <span>21</span></li>
                <li class="aside-actions__item"><img src="{{ asset('imgs/card/repost.svg') }}" alt="Repost"></li>
                <li class="aside-actions__item"><img src="{{ asset('imgs/card/save.svg') }}" alt="Save"></li>
            </ul>
        </aside>
        <article class="article">
            <div class="article__info">
                <span>{{ $news->date }}</span>
                <span>{{ $news->author_name }}</span>
            </div>
            <div class="article__content">
                {!! $news->content !!}
            </div>
            <div class="newsletters">
                <h4 class="newsletters__title">Sign up for The NBC News Newsletter</h4>
                <h6 class="newsletters__author">By Caroline Casey</h6>
                <p class="newsletters__text">
                    A weekly, ad-free newsletter that helps 786,000+ readers stay in the know, be productive, and think more critically about the world.<a href="#" class="newsletters__link">Take a look</a>
                </p>
                <a href="#" class="newsletters__btn">
                    <img src="{{ asset('imgs/newsletters/icon.svg') }}" alt="Letter">
                    <span>Get this Newsletter</span>
                </a>
            </div>
            <div class="about">
                {{-- <div class="about__tags">
                    <div class="tag">
                        <h5 class="tag__title">
                            Freebie
                        </h5>
                    </div>
                    <div class="tag">
                        <h5 class="tag__title">
                            Trending
                        </h5>
                    </div>
                    <div class="tag">
                        <h5 class="tag__title">
                            Lews
                        </h5>
                    </div>
                    <div class="tag">
                        <h5 class="tag__title">
                            Freebie
                        </h5>
                    </div>
                </div> --}}
                <div class="about__actions">
                    <div class="about__left">
                        <button class="about__action">
                            <img onclick="addLike({{ $news->id }})" src="{{ asset('imgs/article/like.svg') }}" id="like-img-{{ $news->id }}" alt="Like">
                            <span>{{ $news->likes }}</span>
                        </button>

                        <button class="about__action">
                            <img src="{{ asset('imgs/article/comments.svg') }}" alt="Comments">
                            <span>21 responses</span>
                        </button>
                    </div>
                    <div class="about__right">
                        <button class="about__action" id="share">
                            <img src="{{ asset('imgs/card/repost.svg') }}" alt="Share">
                            <span>{{ $news->reposts }}</span>
                        </button>
                        <button class="about__action" id="share">
                            <img src="{{ asset('imgs/card/save.svg') }}" alt="Save">
                        </button>
                        <button class="about__action" id="share">
                            <img src="{{ asset('imgs/article/more.svg') }}" alt="More">
                        </button>
                    </div>
                </div>
                <div class="about__info">
                    <div class="about__card">
                        <div class="about__author-img" style="background: url(imgs/article/author.jpg);"></div>
                        <div class="about__container">
                            <h5 class="about__author">Author</h5>
                            <h4 class="about__name">{{ $news->author_name }}</h4>
                        </div>
                    </div>
                    <p class="about__text about__text--mobile">
                        Caroline Casey is an award-winning social activist and founder of <span class="about__text--red">The Valuable 500</span> , a global movement aimed at getting 500 companies to commit to disability inclusion.
                    </p>
                    <a class="follow-btn">
                        <div></div>
                        <span>Follow</span>
                    </a>
                </div>
            </div>
        </article>
        <aside class="aside-rec">
            <h3 class="aside-rec__title">Recommended for you</h3>
            <div class="aside-rec__items">
                @foreach ($recomendations as $rec)
                    <div class="rec-card">
                        <a href="{{ route('news.show', $rec->id) }}">
                            <img src="{{ $rec->imageUrl }} 63.jpg" alt="" class="rec-card__img">
                        </a>
                        <div class="rec-card__actions">
                            <img src="{{ asset('imgs/card/save.svg') }}" alt="Save">
                            <img src="{{ asset('imgs/article/more.svg') }}" alt="More">
                        </div>
                        <div class="rec-card__wrapper">
                            <h4 class="rec-card__title">
                                {{ $rec->title }}
                            </h4>
                        </div>
                    </div>
                @endforeach

            </div>
        </aside>
        <aside class="aside-cards">
            <div class="aside-cards__items">
                <div class="mini-card">
                    <h4 class="mini-card__heading">Recommended for you</h4>
                    <div class="mini-card__wrapper">
                        <a href="{{ route('news.show', $recomendations->first()->id) }}">
                            <img class="mini-card__img" src="{{ $recomendations->first()->imageUrl }}" alt="">
                        </a>

                        <div class="mini-card__container">
                            <h3 class="mini-card__title">{{ $recomendations->first()->title }}</h3>
                        </div>
                    </div>
                </div>
                <div class="mini-card">
                    <h4 class="mini-card__title">Based on Like</h4>
                    <div class="mini-card__wrapper">
                        <a href="{{ route('news.show', $recomendations->last()->id) }}">
                            <img class="mini-card__img" src="{{ $recomendations->last()->imageUrl }}" alt="">
                        </a>
                        <div class="mini-card__container">
                            <h3 class="mini-card__title">{{ $recomendations->last()->title }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <section class="related-topics">
        <h2 class="related-topics__title">Related Topics</h2>
        <div class="related-topics__items">
            @foreach ($topics as $topic)
                <div class="topic">
                    <a href="{{ route('news.show', $topic->id) }}">
                        <img src="{{ $topic->imageUrl }}" alt="" class="topic__img">
                    </a>

                    <div class="topic__wrapper">
                        <h3 class="topic__title">
                            {{ $topic->title }}
                        </h3>
                        <p class="topic__text--mobile">
                            {{ $topic->description }}
                        </p>
                    </div>
                    <div class="topic__actions">
                        <button class="topic__action">
                            <img onclick="addLike($news->id)" src="{{ asset('imgs/card/like.svg') }}" id="like-img-{{ $news->id }}" alt="Like">
                            <span>{{ $topic->likes }}</span>
                        </button>
                        <button class="topic__action" id="share">
                            <img src="{{ asset('imgs/card/repost.svg') }}" alt="Repost">
                            <span>{{ $topic->reposts }}</span>
                        </button>
                        <button class="topic__action">
                            <img src="{{ asset('imgs/article/more.svg') }}" alt="More">
                        </button>
                    </div>
                </div>
            @endforeach

        </div>

    </section>

    <div class="mini-card mini-card--mobile">
        <h4 class="mini-card__title">Based on Like</h4>
        <div class="mini-card__wrapper">
            <img src="{{ asset('imgs/card/imgs/mini-card2.jpg') }}" class="mini-card__img" alt="">
            <div class="mini-card__container">
                <h3 class="mini-card__title">The ADA is turning 30. It's time that it included digital accessibility.</h3>
            </div>
        </div>
    </div>
</main>
@endsection
