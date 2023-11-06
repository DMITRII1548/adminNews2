<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBC NEWS</title>
    <link rel="shortcut icon" href="{{ asset('imgs/header/logo.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@400;500;600;700&family=Montserrat&family=Nunito+Sans:opsz,wght@6..12,400;6..12,700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/scss/main.scss'])
</head>
<body>
    <header class="header" style="background: {{ \App\Models\PageColor::first()->header }};">
        <a href="#" class="header__logo">
            <img src="{{ asset('imgs/header/logo.svg') }}" alt="Логотип">
        </a>
        <img src="{{ asset('imgs/header/search.svg') }}" alt="Поиск" id="search-btn" class="header__search">
        <form action="{{ route('news.search') }}" method="post" class="header__form none" id="search-form">
            @csrf
            <input type="text" name="title" id="title" placeholder="looking for" class="header__input" required>
            <button type="submit" class="header__btn"><img src="{{ asset('imgs/header/search.svg') }}" alt="Поиск" class="header__search"></button>
        </form>
    </header>
    @yield('content')
    <footer class="footer" style="background: {{ \App\Models\PageColor::first()->footer }}">
        <div class="footer__logo">
            <img src="./../imgs/footer/logo.svg" alt="Logo">
            <span>copyright <img src="./../imgs/footer/icon.svg" alt=""> 2020 | NBC NEWS</span>
        </div>
        <ul class="footer__list">
            <li class="footer__item">
                <a href="#" class="footer__link">Privacy Policy</a>
            </li>
            <li class="footer__item">
                <a href="#" class="footer__link">Do not sell my personal info</a>
            </li>
            <li class="footer__item">
                <a href="#" class="footer__link">Terms of Service</a>
            </li>
            <li class="footer__item">
                <a href="#" class="footer__link">nbcnews.com Site Map</a>
            </li>
        </ul>
        <div class="footer__wrapper">
            <nav class="footer__nav">
                <ul class="footer__list-nav">
                    <li><a href="#" class="footer__link">About</a></li>
                    <li><a href="#" class="footer__link">Contact</a></li>
                    <li><a href="#" class="footer__link">Careers</a></li>
                    <li><a href="#" class="footer__link">Coupons</a></li>
                </ul>
            </nav>
            <ul class="footer__socials">
                <li><a href="#" class="footer__social"><img src="./../imgs/footer/socilas/wifi.svg" alt="WiFi"></a></li>
                <li><a href="#" class="footer__social"><img src="./../imgs/footer/socilas/twitter.svg" alt="twitter"></a></li>
                <li><a href="#" class="footer__social"><img src="./../imgs/footer/socilas/reddit.svg" alt="reddit"></a></li>
                <li><a href="#" class="footer__social"><img src="./../imgs/footer/socilas/facebook.svg" alt="facebook"></a></li>
            </ul>
        </div>
    </footer>
    @vite(['resources/js/app.js'])
    <script>
        function addLike(id) {
            axios.get(`/api/likes/${id}`)
                .then(res => {
                    console.log(res)
                    console.log(document.getElementById('like-img-' + id).src)
                    document.getElementById('like-img-' + id).src = '/imgs/card/like-active.svg'
                    // document.getElementById(`likes-${id}`).innerHTML = res.data.likes
                })
        }
    </script>
</body>
</html>
