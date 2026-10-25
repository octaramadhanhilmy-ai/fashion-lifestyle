<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f7f6f2">
    <title>Katalog Produk - MyStyleStore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            --ink: #211e2b;
            --muted: #797683;
            --paper: #f7f6f2;
            --purple: #7257ff;
            --purple-dark: #5840df;
            --lime: #dcff68;
            --line: #eae8e2;
            --font-body: 'DM Sans', sans-serif;
            --font-display: 'Space Grotesk', sans-serif;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-width: 320px;
            min-height: 100vh;
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: var(--font-body);
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        .announcement {
            padding: 9px 20px;
            background: var(--ink);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .1em;
            text-align: center;
            text-transform: uppercase;
        }

        .announcement span {
            color: var(--lime);
        }

        .site-nav {
            position: sticky;
            z-index: 10;
            top: 0;
            border-bottom: 1px solid rgb(33 30 43 / 6%);
            background: rgb(247 246 242 / 88%);
            backdrop-filter: blur(18px);
        }

        .nav-inner {
            display: flex;
            width: min(1320px, calc(100% - 64px));
            min-height: 78px;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin: 0 auto;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: var(--font-display);
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -.07em;
        }

        .brand-mark {
            display: grid;
            width: 35px;
            height: 35px;
            place-items: center;
            border-radius: 12px;
            background: var(--lime);
            color: var(--ink);
            font-size: 18px;
            letter-spacing: -.1em;
            transform: rotate(-6deg);
        }

        .brand-name span {
            color: var(--purple);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
            color: #625f6b;
            font-size: 13px;
            font-weight: 600;
        }

        .nav-links a {
            transition: color .2s ease;
        }

        .nav-links a:hover {
            color: var(--purple);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dashboard-link {
            color: var(--purple);
            font-size: 13px;
            font-weight: 700;
        }

        .cart-link {
            display: inline-flex;
            min-height: 43px;
            align-items: center;
            gap: 9px;
            padding: 0 17px;
            border: 1px solid #e5e2db;
            border-radius: 999px;
            background: #fff;
            font-size: 12px;
            font-weight: 700;
            transition: border-color .2s ease, transform .2s ease, box-shadow .2s ease;
        }

        .cart-link:hover {
            border-color: #c9beff;
            box-shadow: 0 8px 22px rgb(45 35 91 / 8%);
            transform: translateY(-2px);
        }

        .cart-icon {
            font-size: 16px;
        }

        .page-container {
            width: min(1320px, calc(100% - 64px));
            margin: 0 auto;
        }

        .hero {
            position: relative;
            display: grid;
            min-height: 390px;
            grid-template-columns: 1.15fr .85fr;
            align-items: center;
            gap: 24px;
            overflow: hidden;
            margin: 34px auto 0;
            padding: clamp(34px, 6vw, 72px);
            border-radius: 34px;
            background: #eae6ff;
            animation: rise-in .7s both;
        }

        .hero::before,
        .hero::after {
            position: absolute;
            z-index: 0;
            border: 1px solid rgb(114 87 255 / 13%);
            border-radius: 50%;
            content: '';
            pointer-events: none;
        }

        .hero::before {
            top: -190px;
            right: 80px;
            width: 440px;
            height: 440px;
        }

        .hero::after {
            right: -68px;
            bottom: -270px;
            width: 480px;
            height: 480px;
        }

        .hero-copy,
        .hero-art {
            position: relative;
            z-index: 1;
        }

        .hero-label,
        .section-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .hero-label {
            padding: 9px 13px;
            border: 1px solid rgb(114 87 255 / 14%);
            border-radius: 999px;
            background: rgb(255 255 255 / 55%);
            color: var(--purple-dark);
        }

        .hero-label::before {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--purple);
            content: '';
        }

        .hero h1 {
            max-width: 670px;
            margin: 23px 0 15px;
            font-family: var(--font-display);
            font-size: clamp(44px, 6.4vw, 76px);
            font-weight: 700;
            letter-spacing: -.075em;
            line-height: .98;
        }

        .hero h1 em {
            color: var(--purple);
            font-style: normal;
        }

        .hero-copy > p {
            max-width: 460px;
            margin: 0;
            color: #6e697d;
            font-size: 14px;
            line-height: 1.8;
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-top: 25px;
            padding: 13px 18px;
            border-radius: 999px;
            background: var(--ink);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            transition: background .2s ease, transform .2s ease;
        }

        .hero-cta:hover {
            background: var(--purple-dark);
            transform: translateY(-2px);
        }

        .hero-cta span {
            color: var(--lime);
            font-size: 16px;
        }

        .hero-art {
            display: grid;
            min-height: 250px;
            place-items: center;
        }

        .art-disc {
            position: absolute;
            width: min(270px, 80%);
            aspect-ratio: 1;
            border-radius: 50%;
            background: var(--lime);
            animation: float 5s ease-in-out infinite;
        }

        .art-card {
            position: relative;
            display: flex;
            width: min(280px, 85%);
            min-height: 190px;
            flex-direction: column;
            justify-content: space-between;
            padding: 23px;
            border: 1px solid rgb(255 255 255 / 50%);
            border-radius: 24px;
            background: linear-gradient(145deg, #806bff, #6045ec);
            box-shadow: 0 28px 55px rgb(58 41 139 / 25%);
            color: #fff;
            transform: rotate(-7deg);
            animation: float-card 6s ease-in-out infinite;
        }

        .art-card-top,
        .art-card-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .art-card-top {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .15em;
        }

        .art-card-star {
            color: var(--lime);
            font-size: 25px;
        }

        .art-card-title {
            font-family: var(--font-display);
            font-size: 43px;
            font-weight: 700;
            letter-spacing: -.09em;
            line-height: .88;
        }

        .art-card-bottom {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .12em;
        }

        .art-sticker {
            position: absolute;
            right: -8px;
            bottom: 25px;
            display: grid;
            width: 74px;
            height: 74px;
            place-items: center;
            border: 5px solid #eae6ff;
            border-radius: 50%;
            background: #ff8c73;
            color: #fff;
            font-family: var(--font-display);
            font-size: 13px;
            font-weight: 700;
            line-height: 1.05;
            text-align: center;
            transform: rotate(10deg);
        }

        .catalog {
            padding: 76px 0 88px;
        }

        .catalog-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 27px;
        }

        .section-kicker {
            color: var(--purple);
        }

        .section-kicker::before {
            width: 19px;
            height: 2px;
            background: var(--purple);
            content: '';
        }

        .catalog-heading h2 {
            margin: 10px 0 0;
            font-family: var(--font-display);
            font-size: clamp(29px, 4vw, 42px);
            font-weight: 700;
            letter-spacing: -.065em;
        }

        .catalog-heading h2 span {
            color: #a5a2ac;
            font-size: .52em;
            vertical-align: middle;
        }

        .search-wrap {
            position: relative;
            width: min(310px, 100%);
            flex: 0 0 310px;
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 16px;
            color: #898693;
            font-size: 17px;
            pointer-events: none;
            transform: translateY(-50%);
        }

        .search-input {
            width: 100%;
            min-height: 48px;
            padding: 0 17px 0 44px;
            border: 1px solid #e7e4dd;
            border-radius: 999px;
            outline: none;
            background: #fff;
            color: var(--ink);
            font-size: 12px;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .search-input::placeholder {
            color: #aaa7b0;
        }

        .search-input:focus {
            border-color: #b7aaff;
            box-shadow: 0 0 0 4px rgb(114 87 255 / 10%);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .product-card {
            overflow: hidden;
            border: 1px solid #efede7;
            border-radius: 21px;
            background: #fff;
            animation: rise-in .55s both;
            transition: border-color .25s ease, box-shadow .25s ease, transform .25s ease;
        }

        .product-card:nth-child(2) {
            animation-delay: .07s;
        }

        .product-card:nth-child(3) {
            animation-delay: .14s;
        }

        .product-card:nth-child(4) {
            animation-delay: .21s;
        }

        .product-card:hover {
            border-color: #ded8ff;
            box-shadow: 0 18px 38px rgb(42 35 71 / 9%);
            transform: translateY(-6px);
        }

        .product-media {
            position: relative;
            display: grid;
            aspect-ratio: 1 / 1.06;
            place-items: center;
            overflow: hidden;
            background: #f0eef7;
        }

        .product-card:nth-child(4n + 2) .product-media {
            background: #edf2e3;
        }

        .product-card:nth-child(4n + 3) .product-media {
            background: #f6ebe7;
        }

        .product-card:nth-child(4n + 4) .product-media {
            background: #e9eef4;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .55s cubic-bezier(.2, .7, .2, 1);
        }

        .product-card:hover .product-image {
            transform: scale(1.06);
        }

        .image-placeholder {
            display: grid;
            width: 76px;
            height: 76px;
            place-items: center;
            border: 1px solid rgb(114 87 255 / 15%);
            border-radius: 24px;
            background: rgb(255 255 255 / 70%);
            color: var(--purple);
            font-family: var(--font-display);
            font-size: 30px;
            font-weight: 700;
            transform: rotate(-8deg);
        }

        .stock-pill {
            position: absolute;
            top: 13px;
            left: 13px;
            padding: 7px 10px;
            border: 1px solid rgb(255 255 255 / 80%);
            border-radius: 999px;
            background: rgb(255 255 255 / 88%);
            color: #514e5b;
            font-size: 10px;
            font-weight: 700;
            backdrop-filter: blur(8px);
        }

        .product-info {
            display: flex;
            min-height: 174px;
            flex-direction: column;
            padding: 17px;
        }

        .product-name {
            overflow: hidden;
            margin: 0;
            font-family: var(--font-display);
            font-size: 16px;
            font-weight: 600;
            letter-spacing: -.035em;
            text-overflow: ellipsis;
            white-space: nowrap;
            transition: color .2s ease;
        }

        .product-card:hover .product-name {
            color: var(--purple);
        }

        .product-description {
            display: -webkit-box;
            overflow: hidden;
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .product-footer {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 8px;
            margin-top: auto;
            padding-top: 16px;
        }

        .price-label {
            display: block;
            margin-bottom: 3px;
            color: #a09da6;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .09em;
            text-transform: uppercase;
        }

        .product-price {
            font-family: var(--font-display);
            font-size: 15px;
            font-weight: 700;
            letter-spacing: -.045em;
            white-space: nowrap;
        }

        .add-to-cart {
            display: inline-flex;
            min-height: 38px;
            align-items: center;
            gap: 6px;
            padding: 0 12px;
            border: 0;
            border-radius: 12px;
            background: var(--purple);
            color: #fff;
            cursor: pointer;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
            transition: background .2s ease, transform .2s ease;
        }

        .add-to-cart:hover {
            background: var(--purple-dark);
            transform: translateY(-2px);
        }

        .add-to-cart span {
            font-size: 14px;
        }

        .empty-state,
        .search-empty {
            padding: 48px 24px;
            border: 1px dashed #dcd8e6;
            border-radius: 22px;
            background: rgb(255 255 255 / 65%);
            text-align: center;
        }

        .empty-symbol {
            display: grid;
            width: 54px;
            height: 54px;
            place-items: center;
            margin: 0 auto 14px;
            border-radius: 18px;
            background: #eeeaff;
            color: var(--purple);
            font-size: 23px;
        }

        .empty-state p,
        .search-empty p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        .search-empty {
            display: none;
            margin-top: 16px;
        }

        .search-empty.is-visible {
            display: block;
        }

        .site-footer {
            border-top: 1px solid #e9e7e1;
            background: #f1f0eb;
        }

        .footer-inner {
            display: flex;
            width: min(1320px, calc(100% - 64px));
            min-height: 78px;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin: 0 auto;
            color: #898692;
            font-size: 10px;
        }

        .footer-note {
            color: #625f6b;
            font-weight: 700;
        }

        :focus-visible {
            outline: 3px solid rgb(114 87 255 / 45%);
            outline-offset: 3px;
        }

        @keyframes rise-in {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-9px) scale(1.02);
            }
        }

        @keyframes float-card {
            0%,
            100% {
                transform: translateY(0) rotate(-7deg);
            }

            50% {
                transform: translateY(-8px) rotate(-4deg);
            }
        }

        @media (max-width: 1000px) {
            .product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .hero {
                min-height: 360px;
            }
        }

        @media (max-width: 760px) {
            .nav-inner,
            .page-container,
            .footer-inner {
                width: min(100% - 36px, 600px);
            }

            .nav-inner {
                min-height: 68px;
            }

            .nav-links {
                display: none;
            }

            .hero {
                min-height: unset;
                grid-template-columns: 1fr .72fr;
                gap: 8px;
                margin-top: 20px;
                padding: 34px 28px;
                border-radius: 27px;
            }

            .hero h1 {
                font-size: clamp(40px, 8vw, 60px);
            }

            .hero-copy > p {
                font-size: 12px;
            }

            .hero-art {
                min-height: 200px;
            }

            .art-card {
                min-height: 155px;
                padding: 16px;
            }

            .art-card-title {
                font-size: 34px;
            }

            .art-sticker {
                right: -12px;
                bottom: 7px;
                width: 60px;
                height: 60px;
                font-size: 11px;
            }

            .catalog {
                padding: 58px 0 68px;
            }

            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
            }

            .product-info {
                min-height: 169px;
                padding: 14px;
            }

            .product-name {
                font-size: 14px;
            }

            .product-price {
                font-size: 13px;
            }

            .add-to-cart {
                min-height: 35px;
                gap: 4px;
                padding: 0 9px;
                font-size: 9px;
            }
        }

        @media (max-width: 520px) {
            .announcement {
                font-size: 9px;
            }

            .nav-inner,
            .page-container,
            .footer-inner {
                width: calc(100% - 32px);
            }

            .brand {
                gap: 8px;
                font-size: 18px;
            }

            .brand-mark {
                width: 32px;
                height: 32px;
            }

            .nav-actions {
                gap: 8px;
            }

            .dashboard-link {
                font-size: 11px;
            }

            .cart-link {
                min-height: 39px;
                gap: 6px;
                padding: 0 12px;
                font-size: 11px;
            }

            .hero {
                display: block;
                padding: 30px 24px 20px;
            }

            .hero h1 {
                max-width: 370px;
                margin-top: 20px;
                font-size: clamp(42px, 12vw, 58px);
            }

            .hero-copy > p {
                max-width: 350px;
            }

            .hero-cta {
                margin-top: 18px;
                padding: 12px 15px;
            }

            .hero-art {
                min-height: 205px;
                margin-top: 12px;
            }

            .art-disc {
                width: 190px;
            }

            .art-card {
                width: 220px;
            }

            .catalog-heading {
                align-items: stretch;
                flex-direction: column;
                gap: 18px;
            }

            .search-wrap {
                width: 100%;
                flex-basis: auto;
            }

            .product-grid {
                gap: 10px;
            }

            .product-media {
                aspect-ratio: 1 / 1;
            }

            .stock-pill {
                top: 9px;
                left: 9px;
                padding: 6px 8px;
                font-size: 9px;
            }

            .product-info {
                min-height: 175px;
                padding: 12px;
            }

            .product-name {
                font-size: 13px;
            }

            .product-description {
                font-size: 10px;
            }

            .product-footer {
                align-items: stretch;
                flex-direction: column;
                gap: 10px;
                padding-top: 13px;
            }

            .add-to-cart {
                width: 100%;
                justify-content: center;
                font-size: 10px;
            }

            .footer-inner {
                min-height: 74px;
                align-items: flex-start;
                flex-direction: column;
                justify-content: center;
                gap: 5px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body>
    <div class="announcement">
        Built for your days <span>✳</span> made for your main character era
    </div>

    <nav class="site-nav" aria-label="Navigasi utama">
        <div class="nav-inner">
            <a href="{{ url('/') }}" class="brand" aria-label="KampusStyle, kembali ke beranda">
                <span class="brand-mark" aria-hidden="true">M.</span>
                <span class="brand-name">MyStyle<span>Store.</span></span>
            </a>

            <div class="nav-links">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ route('catalog.index') }}"></a>
            </div>

            <div class="nav-actions">
                @auth
                    <a href="{{ url('/admin') }}" class="dashboard-link">Dashboard</a>
                @endauth
                <a href="{{ url('/cart') }}" class="cart-link">
                    <span class="cart-icon" aria-hidden="true">↗</span>
                    Keranjang
                </a>
            </div>
        </div>
    </nav>

    <main class="page-container">
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero-copy">
                <span class="hero-label">MyStyleStore.</span>
                <h1 id="hero-title">Gaya Bagus,<br><em>level up.</em></h1>
                <p>Good fits, good mood. Temukan fashion dan essentials kamu yang bikin hari biasa terasa lebih .</p>
                <a href="#koleksi" class="hero-cta">Explore the collection <span aria-hidden="true">↘</span></a>
            </div>

            <div class="hero-art" aria-hidden="true">
                <div class="art-disc"></div>
                <div class="art-card">
                    <div class="art-card-top">
                        <span>YOUR DAILY UNIFORM</span>
                        <span class="art-card-star">✳</span>
                    </div>
                    <div class="art-card-title">OUTFIT<br>CHECK</div>
                    <div class="art-card-bottom">
                        <span>STYLE YOUR DAY</span>
                        <span>KS—026</span>
                    </div>
                    <div class="art-sticker">GOOD<br>VIBES<br>ONLY</div>
                </div>
            </div>
        </section>

        <section class="catalog" id="koleksi" aria-labelledby="catalog-title">
            <div class="catalog-heading">
                <div>
                    <span class="section-kicker">Curated for your everyday</span>
                    <h2 id="catalog-title">Find your fit <span>({{ $products->count() }} item)</span></h2>
                </div>
                <label class="search-wrap">
                    <span class="search-icon" aria-hidden="true">⌕</span>
                    <input
                        class="search-input"
                        id="product-search"
                        type="search"
                        placeholder="Cari produk favoritmu..."
                        aria-label="Cari produk"
                    >
                </label>
            </div>

            <div class="product-grid" id="product-grid">
                @forelse ($products as $item)
                    <article
                        class="product-card"
                        data-product-card
                        data-search="{{ strtolower($item->name . ' ' . ($item->description ?? '')) }}"
                    >
                        <div class="product-media">
                            @if ($item->image)
                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    class="product-image"
                                    alt="{{ $item->name }}"
                                    loading="lazy"
                                >
                            @else
                                <span class="image-placeholder" aria-label="Produk belum memiliki gambar">K.</span>
                            @endif
                            <span class="stock-pill">Stok {{ $item->stock }}</span>
                        </div>

                        <div class="product-info">
                            <div>
                                <h3 class="product-name" title="{{ $item->name }}">{{ $item->name }}</h3>
                                <p class="product-description">{{ $item->description }}</p>
                            </div>

                            <div class="product-footer">
                                <div>
                                    <span class="price-label">Harga</span>
                                    <span class="product-price">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                </div>

                                <form action="{{ url('/cart/add/' . $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="add-to-cart">
                                        <span aria-hidden="true">+</span> Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <span class="empty-symbol" aria-hidden="true">✳</span>
                        <p>Belum ada produk yang tersedia. Cek lagi nanti, ya!</p>
                    </div>
                @endforelse
            </div>

            <div class="search-empty" id="search-empty" role="status" aria-live="polite">
                <p>Hmm, produk yang kamu cari belum ketemu. Coba kata kunci lain, ya.</p>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <span>&copy; 2026 MyStyleStore. Dibangun untuk Technofest Perbanas.</span>
            <span class="footer-note">Stay comfy. Stay iconic. ✳</span>
        </div>
    </footer>

    <script>
        const productSearch = document.getElementById('product-search');
        const productCards = [...document.querySelectorAll('[data-product-card]')];
        const searchEmpty = document.getElementById('search-empty');

        productSearch.addEventListener('input', (event) => {
            const query = event.target.value.trim().toLocaleLowerCase('id');
            let visibleProducts = 0;

            productCards.forEach((card) => {
                const matches = card.dataset.search.toLocaleLowerCase('id').includes(query);
                card.hidden = !matches;
                visibleProducts += Number(matches);
            });

            searchEmpty.classList.toggle('is-visible', productCards.length > 0 && visibleProducts === 0);
        });
    </script>
</body>
</html>
