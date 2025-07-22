@extends('index')

@push('style')
    <title>About</title>
@endpush

@section('main-Content')
    <header>
        <div class="logo"><span>J</span>oy</div>
        <ul class="navlist">    
            <li><a href="/">Home</a></li>
            <li><a href="/edu">Education</a></li>
            <li><a href="/project">Project</a></li>
            <li><a href="/about">About</a></li>
        </ul>
        <div id="menu-icon" class="bi bi-list"></div>
    </header>

    <!-- About section -->
    <section id="about" class="about">
        <div class="about-content">
            <h1>About Me</h1>
            <p>description</p>
        </div>
    </section>