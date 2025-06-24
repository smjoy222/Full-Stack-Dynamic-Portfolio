@extends('index')
@push('style')
    <title>Home</title>
@endpush
@section('main-Content')

<header>
    <div class="logo"><span>J</span>oy</div>
<ul class="navlist">    
        <li><a href="/">Home</a></li>
        <li><a href="/work">Work</a></li>
        <li><a href="/project">Project</a></li>
        <li><a href="/about">About</a></li>
    </ul>
    <div id="menu-icon" class="bi bi-list"></div>
</header>

<!-- home section -->
<section id="home" class="home">
    <div class="home-content">
        <h1>Hi! I'm Joy</h1>
        <div class="change-text">
          <h3>And I'm </h3>
          <h3>
            <span class="word">Web Developer</span>
            <span class="word">Student</span>
            <span class="word">UI/UX Designer</span>
            <span class="word">Software Developer</span>
            <span class="word">Frontend Developer</span>
          </h3>
        </div>
        <p>I'm a web developer with a passion for creating beautiful and functional websites. I love coding and I'm always eager to learn new technologies.</p>

        <div class="info-box">
          <div class="email-info">
            <h5>Email</h5>
            <span>smjoy222@gmail.com</span>
          </div>
        </div>

        <div class="btn-box">
          <a href="#" class="btn">Download CV</a>
          <a href="#" class="btn">Contact Me</a>
        </div>

        <div class="social-icons">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-github"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>

    <div class="home-img">
      <div class="img-box">
        <img src="{{ asset('assets/images/me.jpg') }}" alt="Profile picture">
      </div>
    </div>
</section>