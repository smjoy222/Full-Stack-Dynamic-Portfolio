@extends('index')

@push('style')
    <title>Project</title>
@endpush

@section('main-Content')
    <header>
        <div class="logo"><span>J</span>oy</div>
        <ul class="navlist">    
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('skills') }}">Skills</a></li>
            <li><a href="/edu">Education</a></li>
            <li><a href="/experience">Experience</a></li>
            <li><a href="/achievement">Achievement</a></li>
            <li><a href="/project">Project</a></li>
            <li><a href="/about">About</a></li>
        </ul>
        <div id="menu-icon" class="bi bi-list"></div>
    </header>

        <!--project section copied from Home-->
        <section id="projects" class="projects">
            <div class="main-text">
                <span>What I Do</span>
                <h2>Latest Projects</h2>
            </div>

            <div class="section-projects">
                <div class="project-box">
                    <i class="bi bi-stack project-icon"></i>
                    <h3>Web Developer</h3>
                    <p>I specialize in building responsive and user-friendly websites using modern web technologies.</p>
                    <div class="btn-box project-btn">
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>

                <div class="project-box">
                    <i class="bi bi-code-slash project-icon"></i>
                    <h3>App Developer</h3>
                    <p>I specialize in building responsive and user-friendly applications using modern app technologies.</p>
                    <div class="btn-box project-btn">
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>

                <div class="project-box">
                    <i class="bi bi-display project-icon"></i>
                    <h3>Research</h3>
                    <p>I specialize in conducting research and analysis using modern research methodologies.</p>
                    <div class="btn-box project-btn">
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>
            </div>
        </section>