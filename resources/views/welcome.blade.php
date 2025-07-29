@extends('index')
@push('style')
    <title>Home</title>
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

<!-- home section -->
<section id="home" class="home">
    <div class="home-content">
        <h1>Hi! I'm Joy</h1>
        <div class="change-text">
          <h3>And I'm </h3>
          <h3>
            <span class="word">Web&nbsp;Developer</span>
            <span class="word">Student</span>
            <span class="word">UI/UX&nbsp;Designer</span>
            <span class="word">Software&nbsp;Developer</span>
            <span class="word">Frontend&nbsp;Developer</span>
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
        <img src="{{ asset('assets/images/logo.png') }}" alt="Profile picture">
      </div>

      <div class="liquid-shape">
        <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" id="blobSvg">
          <path fill="#12f7ff">
            <animate attributeName="d"
                  dur="20000ms"
                  repeatCount="indefinite"
                  values="
                  M428.5,305Q440,360,402,403.5Q364,447,307,464Q250,481,204.5,444Q159,407,100,388.5Q41,370,23,310Q5,250,20.5,188Q36,126,89.5,95.5Q143,65,196.5,39Q250,13,312,24Q374,35,413.5,84Q453,133,435,191.5Q417,250,428.5,305Z;

                  M402,293Q399,336,384.5,396.5Q370,457,310,435Q250,413,194,428Q138,443,100,400.5Q62,358,44.5,304Q27,250,59,204Q91,158,118,112.5Q145,67,197.5,63.5Q250,60,298.5,71Q347,82,406,104Q465,126,435,188Q405,250,402,293Z;

                  M436,293Q398,336,370,372.5Q342,409,296,438Q250,467,198.5,447.5Q147,428,119,385Q91,342,54.5,296Q18,250,45,198.5Q72,147,108,106.5Q144,66,197,36Q250,6,295.5,49Q341,92,375,125Q409,158,441.5,204Q474,250,436,293Z;

                  M462.5,305.5Q442,361,403.5,405.5Q365,450,307.5,463.5Q250,477,189,469.5Q128,462,91,412.5Q54,363,69,306.5Q84,250,99,210.5Q114,171,127.5,116.5Q141,62,195.5,44Q250,26,303,46Q356,66,391,107.5Q426,149,454.5,199.5Q483,250,462.5,305.5Z;

                  M436.5,299Q420,348,394,401Q368,454,309,443Q250,432,195,436.5Q140,441,116.5,391Q93,341,67,295.5Q41,250,74.5,209Q108,168,139.5,141Q171,114,210.5,81.5Q250,49,310,45.5Q370,42,386.5,102Q403,162,428,206Q453,250,436.5,299Z;

                  M409.5,292.5Q397,335,375,381.5Q353,428,301.5,448.5Q250,469,210,428.5Q170,388,108.5,377.5Q47,367,64.5,308.5Q82,250,63,190.5Q44,131,89,90Q134,49,192,58.5Q250,68,299,74.5Q348,81,400,107Q452,133,437,191.5Q422,250,409.5,292.5Z;

                  M453,308.5Q453,367,403.5,399Q354,431,302,419.5Q250,408,205.5,406Q161,404,124.5,374Q88,344,83,297Q78,250,87,205.5Q96,161,130,131Q164,101,207,99.5Q250,98,297.5,91.5Q345,85,378,121Q411,157,432,203.5Q453,250,453,308.5Z;

                  M428.5,305Q440,360,402,403.5Q364,447,307,464Q250,481,204.5,444Q159,407,100,388.5Q41,370,23,310Q5,250,20.5,188Q36,126,89.5,95.5Q143,65,196.5,39Q250,13,312,24Q374,35,413.5,84Q453,133,435,191.5Q417,250,428.5,305Z;
                  ">
            </animate>
          </path>
        </svg>
      </div>

      <div class="liquid-shape">
        <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" id="blobSvg">
          <path fill="#12f7ff">
            <animate attributeName="d"
                  dur="20000ms"
                  repeatCount="indefinite"
                  values="
                  M428.5,305Q440,360,402,403.5Q364,447,307,464Q250,481,204.5,444Q159,407,100,388.5Q41,370,23,310Q5,250,20.5,188Q36,126,89.5,95.5Q143,65,196.5,39Q250,13,312,24Q374,35,413.5,84Q453,133,435,191.5Q417,250,428.5,305Z;

                  M402,293Q399,336,384.5,396.5Q370,457,310,435Q250,413,194,428Q138,443,100,400.5Q62,358,44.5,304Q27,250,59,204Q91,158,118,112.5Q145,67,197.5,63.5Q250,60,298.5,71Q347,82,406,104Q465,126,435,188Q405,250,402,293Z;

                  M436,293Q398,336,370,372.5Q342,409,296,438Q250,467,198.5,447.5Q147,428,119,385Q91,342,54.5,296Q18,250,45,198.5Q72,147,108,106.5Q144,66,197,36Q250,6,295.5,49Q341,92,375,125Q409,158,441.5,204Q474,250,436,293Z;

                  M462.5,305.5Q442,361,403.5,405.5Q365,450,307.5,463.5Q250,477,189,469.5Q128,462,91,412.5Q54,363,69,306.5Q84,250,99,210.5Q114,171,127.5,116.5Q141,62,195.5,44Q250,26,303,46Q356,66,391,107.5Q426,149,454.5,199.5Q483,250,462.5,305.5Z;

                  M436.5,299Q420,348,394,401Q368,454,309,443Q250,432,195,436.5Q140,441,116.5,391Q93,341,67,295.5Q41,250,74.5,209Q108,168,139.5,141Q171,114,210.5,81.5Q250,49,310,45.5Q370,42,386.5,102Q403,162,428,206Q453,250,436.5,299Z;

                  M409.5,292.5Q397,335,375,381.5Q353,428,301.5,448.5Q250,469,210,428.5Q170,388,108.5,377.5Q47,367,64.5,308.5Q82,250,63,190.5Q44,131,89,90Q134,49,192,58.5Q250,68,299,74.5Q348,81,400,107Q452,133,437,191.5Q422,250,409.5,292.5Z;

                  M453,308.5Q453,367,403.5,399Q354,431,302,419.5Q250,408,205.5,406Q161,404,124.5,374Q88,344,83,297Q78,250,87,205.5Q96,161,130,131Q164,101,207,99.5Q250,98,297.5,91.5Q345,85,378,121Q411,157,432,203.5Q453,250,453,308.5Z;

                  M428.5,305Q440,360,402,403.5Q364,447,307,464Q250,481,204.5,444Q159,407,100,388.5Q41,370,23,310Q5,250,20.5,188Q36,126,89.5,95.5Q143,65,196.5,39Q250,13,312,24Q374,35,413.5,84Q453,133,435,191.5Q417,250,428.5,305Z;
                  ">
            </animate>
          </path>
        </svg>
      </div>
    </div>
</section>
<!--home section end-->

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

<!--project section-->
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
      <h3>Web Developer</h3>
      <p>I specialize in building responsive and user-friendly websites using modern web technologies.</p>
      <div class="btn-box project-btn">
        <a href="#" class="btn">Read More</a>
      </div>
    </div>

    <div class="project-box">
      <i class="bi bi-display project-icon"></i>
      <h3>Web Developer</h3>
      <p>I specialize in building responsive and user-friendly websites using modern web technologies.</p>
      <div class="btn-box project-btn">
        <a href="#" class="btn">Read More</a>
      </div>
    </div>
  </div>
</section>
<!--project section end-->

<!--skill section-->
<section id="skills" class="skills">
  <div class="main-text">
    <span>Technical and professional</span>
    <h2>My Skills</h2>
  </div>

  <div class="skill-main">
    <div class="skill-left">
      <h3>Technical Skills</h3>
      <div class="skill-bar">
        <div class="info">
          <p>HTML</p>
          <p>72%</p>
        </div>
        <div class="bar">
          <span>html</span>
        </div>
      </div>

      <div class="skill-bar">
        <div class="info">
          <p>Flutter</p>
          <p>80%</p>
        </div>
        <div class="bar">
          <span>flutter</span>
        </div>
      </div>

      <div class="skill-bar">
        <div class="info">
          <p>Programming</p>
          <p>85%</p>
        </div>
        <div class="bar">
          <span>programming</span>
        </div>
      </div>

      <div class="skill-bar">
        <div class="info">
          <p>Research</p>
          <p>90%</p>
        </div>
        <div class="bar">
          <span>research</span>
        </div>
      </div>
    </div>
    <div class="skill-right">
      <h3>professional Skills</h3>
    </div>
  </div>
</section>
@endsection