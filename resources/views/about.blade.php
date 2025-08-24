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

        <!--about section-->
        <section id="about" class="about">
            <div class="img-about">
                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                <div class="info-about1">
                    <span>10+</span>
                    <p>Years of Experience</p>
                </div>
                <div class="info-about2">
                    <span>150+</span>
                    <p>Projects Completed</p>
                </div>
                <div class="info-about3">
                    <span>200+</span>
                    <p>Happy Clients</p>
                </div>
            </div>

            <div class="about-content">
                <span>Let me introduce myself</span>
                <h2>About Me</h2>
                <h3>A story of good</h3>
                <p>I'm a passionate web developer with a strong background in creating dynamic and responsive websites. My expertise lies in HTML, CSS, JavaScript, and various frameworks that enhance user experience.
                <br>I enjoy tackling challenges and continuously improving my skills to stay updated with the latest web technologies.</p>
                <div class="btn-box">
                    <a href="#" class="btn">Read More</a>
                </div>
            </div>
        </section>
        <!--about section end-->
@endsection