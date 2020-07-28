<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- META TAGS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- CSS FILES -->
    <link href="{{ asset('blog/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('blog/css/fontawesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('blog/css/style.css') }}" rel="stylesheet" type="text/css">
    @yield('head')
</head>

<body>
    <!-- READING POSITION INDICATOR -->
    <progress value="0" id="eskimo-progress-bar">
        <span class="eskimo-progress-container">
            <span class="eskimo-progress-bar"></span>
        </span>
    </progress>
    <!-- SITE WRAPPER -->
    <div id="eskimo-site-wrapper">
        <!-- MAIN CONTAINER -->
        <main id="eskimo-main-container">
            <div class="container">
                <!-- SIDEBAR -->
                <div id="eskimo-sidebar">
                    <div id="eskimo-sidebar-wrapper" class="d-flex align-items-start flex-column h-100 w-100">
                        <!-- LOGO -->
                        <div id="eskimo-logo-cell" class="w-100">
                            <a class="eskimo-logo-link" href="/">
                                <img src="{{ asset('blog/images/logo.png') }}" class="eskimo-logo" alt="eskimo" />
                            </a>
                        </div>
                        <!-- MENU CONTAINER -->
                        <div id="eskimo-sidebar-cell" class="w-100">
                            <!-- MOBILE MENU BUTTON -->
                            <div id="eskimo-menu-toggle">MENU</div>
                            <!-- MENU -->
                            <nav id="eskimo-main-menu" class="menu-main-menu-container">
                                <ul class="eskimo-menu-ul">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="#eskimo-panel" id="eskimo-panel-open">About Me</a></li>
                                    @if (Auth::check())
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </main>
        <!-- FOOTER -->
        <footer id="eskimo-footer">
            <div class="container">
                @if ($posts == 0)
                <div class="row eskimo-footer-wrapper">
                    <!-- FOOTER WIDGET 1 -->
                    <div class="col-12 col-lg-12 mb-4 mb-lg-0">
                        <h1 class="eskimo-title-with-border"><span>Hi There!</span></h1>
                        <h5>It's time to make your first post.</h5>
                        @if (Auth::check())
                        <h5>For your next step, go to <a href="{{ route('post.add') }}">add post page</a> ;)</h5>
                        @else
                        <h5>For your first step, feel free to <a href="{{ route('login') }}">login</a> :)</h5>
                        @endif
                    </div>
                </div>
                @endif
                <!-- CREDITS -->
                <div class="eskimo-footer-credits">
                    <p>
                        Made with love by <a href="https://www.linkedin.com/in/reyhan-ramadhan-4894a91b3" target="_blank">Reyhan Ramadhan</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <!-- SLIDE PANEL OVERLAY -->
    <div id="eskimo-overlay"></div>
    <!-- SLIDE PANEL -->
    <div id="eskimo-panels">
        <aside id="eskimo-panel" class="eskimo-panel">
            <div class="eskimo-panel-inner">
                <!-- CLOSE SLIDE PANEL BUTTON -->
                <a href="#" class="eskimo-panel-close"><i class="fa fa-times"></i></a>
                <!-- AUTHOR BOX -->
                <div class="eskimo-author-box eskimo-widget">
                    <div class="eskimo-author-img">
                        <img src="{{ asset('blog/images/300x300.png') }}" alt="" />
                    </div>
                    <h3><span>REYHAN RAMADHAN</span></h3>
                    <p class="eskimo-author-subtitle">FULL STACK WEB DEVELOPER</p>
                    <p class="eskimo-author-description">
                        I'm a Web Developer focused on Laravel framework.
                        I made this web using Laravel with Bootstrap 4 and blog template named eskimo.
                        According to the requirements of webinar challenge that i just follow recently,
                        this web just has several capabilities,
                        including CRUD of Post and authentication for admin to enter the admin panel.
                        If you have any questions, feel free to contact me on WA :)
                    </p>
                    <div class="eskimo-author-box-btn">
                        <a class="btn btn-default" href="https://wa.me/+6282258843864">WA ME</a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <!-- JS FILES -->
    <script src="{{ asset('blog/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('blog/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('blog/js/salvattore.min.js') }}"></script>
    <script src="{{ asset('blog/js/panel.js') }}"></script>
    <script src="{{ asset('blog/js/reading-position-indicator.js') }}"></script>
    <script src="{{ asset('blog/js/custom.js') }}"></script>
    @yield('js')
</body>

</html>
