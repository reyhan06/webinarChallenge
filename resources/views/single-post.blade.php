@extends('layouts.blog')

@section('head')
<title>Post Title - Blog Title</title>
<meta name="description" content="excerpt content">
<link href="{{ asset('blog/css/featherlight.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('blog/css/rrssb.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="eskimo-page-title">
    <h1><span>A Single Post</span></h1>
    <div class="eskimo-page-title-meta">
        <div class="eskimo-author-meta">
            By <a class="author-meta" href="author.html">Egemenerd</a>
        </div>
        <div class="eskimo-date-meta">May 25, 2018</div>
    </div>
</div>
<!-- FEATURED IMAGE -->
<div class="eskimo-featured-img">
    <img src="{{ asset('blog/images/1200x600.png') }}" alt="" />
</div>
<!-- POST CONTENT -->
<div class="eskimo-page-content">
    <p>Dolore commodo ea excepteur, do irure praetermissum aut enim proident aut laboris, an lorem irure irure commodo. Iudicem culpa litteris ad enim eu mandaremus. Nostrud quis ne excepteur praetermissum, probant non probant, nulla cernantur nostrud ab expetendis irure senserit, id magna aute velit iudicem ex quem quibusdam senserit. Si nisi de aliqua, si mandaremus sed expetendis an ad labore cernantur domesticarum ne malis arbitror ad quae multos se nostrud e lorem occaecat, lorem senserit et <strong>philosophari</strong> sed ingeniis malis possumus, est irure offendit.</p>
    <p>Tempor cillum nostrud ex sunt expetendis et ipsum quis. Ea sint tempor non tempor veniam sed deserunt relinqueret, culpa probant aut tamen ipsum ut incididunt elit cupidatat commodo, ita <strong>voluptate comprehenderit</strong> hic ubi cillum quorum veniam cupidatat, ingeniis varias ut arbitror distinguantur non summis in incurreret. Id veniam varias et vidisse. Do fugiat magna in proident. Aut possumus eruditionem in deserunt velit sed admodum comprehenderit id non cillum anim de appellat, ubi tamen singulis sempiternum, occaecat sunt appellat appellat ex varias an in quem laborum an si ita quid multos irure do excepteur culpa quamquam.</p>
    <blockquote>
        <p>Ne aliquip cohaerescant ad dolore offendit ex cillum quae ita ullamco duis arbitror expetendis in dolor an aliquip do summis iis ut quorum reprehenderit, ab quae nostrud efflorescere de sunt do fabulas in ea nulla id quis. Nostrud a mandaremus, qui amet iis multos. O arbitror praesentibus. Varias ubi quo nulla litteris. Anim tempor si aliqua multos. Nescius labore incurreret vidisse.</p>
    </blockquote>
    <p><a href="https://themeforest.net/user/egemenerd/portfolio?ref=egemenerd" target="_blank">Nulla nostrud aut irure noster.</a> Tempor consectetur o mentitum ne sed hic sint veniam anim. Se se efflorescere a varias mandaremus qui velit anim, quorum efflorescere aliquip velit cernantur, proident elit mentitum. Possumus quo quem iis enim litteris arbitrantur te de sunt tamen malis tempor ut cernantur ne probant. Cernantur ne noster, a si nulla laboris, tempor elit eram occaecat noster, ita in lorem minim multos.</p>
    <h2>A Photo Gallery</h2>
    <p>Qui illum fugiat velit laboris. Ad esse irure multos appellat. Ad labore mandaremus. Litteris aute ullamco iis non in coniunctione a iis possumus si admodum e enim nostrud praesentibus. Non aute transferrem te et aute fidelissimae. Mandaremus veniam ab cupidatat exquisitaque, e quae laboris domesticarum, non sint mentitum fabulas de anim proident transferrem, ita aliqua imitarentur in in labore illum eram offendit, nisi fidelissimae possumus noster ullamco se eiusmod multos ex offendit transferrem. Iudicem voluptatibus qui consequat ita litteris culpa arbitror senserit.</p>
    <!-- IMAGE GALLERY -->
    <div class="eskimo-masonry-grid eskimo-gallery">
        <div class="eskimo-three-columns" data-columns>
            <!-- GALLERY ITEM 1 -->
            <div class="eskimo-gallery-item">
                <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                <img src="{{ asset('blog/images/900x600.png') }}" alt="" />
            </a>
            </div>
            <!-- GALLERY ITEM 2 -->
            <div class="eskimo-gallery-item">
                <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                <img src="{{ asset('blog/images/900x600.png') }}" alt="" />
            </a>
            </div>
            <!-- GALLERY ITEM 3 -->
            <div class="eskimo-gallery-item">
                <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                <img src="{{ asset('blog/images/900x600.png') }}" alt="" />
            </a>
            </div>
            <!-- GALLERY ITEM 4 -->
            <div class="eskimo-gallery-item">
                <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                <img src="{{ asset('blog/images/900x600.png') }}" alt="" />
            </a>
            </div>
            <!-- GALLERY ITEM 5 -->
            <div class="eskimo-gallery-item">
                <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                <img src="{{ asset('blog/images/900x600.png') }}" alt="" />
            </a>
            </div>
            <!-- GALLERY ITEM 6 -->
            <div class="eskimo-gallery-item">
                <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                <img src="{{ asset('blog/images/900x600.png') }}" alt="" />
            </a>
            </div>
        </div>
    </div>
    <p>Incurreret elit ab excepteur praetermissum. In dolor expetendis cernantur a expetendis noster amet e quorum in fugiat cupidatat quo tamen minim sed ex quo quae irure aute. Aut ipsum mentitum, malis fabulas aut esse noster est se lorem praetermissum, quem admodum litteris. Quid instituendarum tempor varias nescius, sed fugiat tamen nulla admodum aut voluptate ipsum velit possumus magna, qui multos quibusdam praesentibus. Quo culpa cernantur ne incididunt ipsum de tempor exercitation ea de eu varias multos esse ab anim an iudicem ab ex quorum quamquam, cernantur nisi sed senserit graviterque de arbitror quorum esse iis varias se aliquip sed minim. Ullamco arbitrantur qui commodo qui offendit esse cernantur expetendis. Duis ingeniis iudicem, irure est mandaremus.</p>
</div>
@endsection
