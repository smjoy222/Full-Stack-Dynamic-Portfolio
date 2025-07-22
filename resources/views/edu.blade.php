@extends('index')
@push('style')
    <title>Education</title>
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

<!-- education section -->
<section id="education" class="education">
    <div class="education-content">
        <h1>My Education</h1>
        <p>Here is my educational background and qualifications.</p>
        
        <div class="education-cards">
            <div class="education-card">
                <h3>Bachelor of Science in Computer Science</h3>
                <p><strong>University:</strong> University of Dhaka</p>
                <p><strong>Year:</strong> 2021-2025</p>
                <p><strong>CGPA:</strong> 3.85/4.00</p>
            </div>
            
            <div class="education-card">
                <h3>Higher Secondary Certificate (HSC)</h3>
                <p><strong>College:</strong> Dhaka College</p>
                <p><strong>Year:</strong> 2018-2020</p>
                <p><strong>Grade:</strong> A+</p>
            </div>
        </div>
    </div>
</section>

@endsection
