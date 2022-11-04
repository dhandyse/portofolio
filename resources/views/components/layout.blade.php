<html>

<head>
    <title>{{ $title ?? 'ini defult title' }}</title>
    <link href="{{ \Illuminate\Support\Facades\URL::asset('/css/app.css') }}" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet" />
    <link rel="icon" href="{!! asset('images/dhlogo.png') !!}" />
</head>

<body>
    <header>
        <ul class="kiri">
            <li><a href="{{ route('site.index') }}">Dhandy Hosen

                </a>
            </li>

        </ul>
        <ul class="kanan">
            <li><a href="{{ route('site.education') }}">Education</a></li>

            <li><a href="{{ route('site.dokumen.index') }}">Repository</a></li>
        </ul>
    </header>
    <main>
        {{ $slot }}
    </main>

    <footer>
        <div class="footer-l2">
            <div class="sitemap">
                <div class="list">
                    <h3>Dhandy Hosen</h3>

                    <ul>

                        <li><a> dhandykusuma24@gmail.com</a></li>

                    </ul>
                    <div class="copyrights">© 2022 Dhandy Hosen. All rights reserved.</div>
                </div>
    </footer>
</body>

</html>
