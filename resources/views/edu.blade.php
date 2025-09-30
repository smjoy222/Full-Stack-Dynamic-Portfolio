@extends('index')
@push('style')
    <title>Education</title>
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

<!-- education section -->
<section id="education" class="education">
    <div class="particles-container">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    
    <div class="education-content">
        <div class="main-text">
            <span class="animated-text">ACADEMIC BACKGROUND</span>
            <h2 class="glow-text">My Education</h2>
            <div class="divider">
                <span class="divider-line"></span>
                <span class="divider-icon"><i class="bi bi-mortarboard"></i></span>
                <span class="divider-line"></span>
            </div>
        </div>

        <div class="education-cards">
            @forelse(($educations ?? []) as $edu)
                <div class="education-card">
                    <div class="education-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="education-details">
                        <h3>{{ $edu->type }} {{ $edu->name ? '— '.$edu->name : '' }}</h3>
                        <div class="education-meta">
                            <span class="education-institute">
                                <i class="bi bi-building"></i>
                                {{ $edu->institute }}
                            </span>
                            <span class="education-year">
                                <i class="bi bi-calendar-event"></i>
                                {{ $edu->enrolled_year }}
                                @if(!empty($edu->passing_year)) - {{ $edu->passing_year }} @else - <span class="present-tag">Present</span> @endif
                            </span>
                        </div>
                        @if(!empty($edu->grade))
                            <div class="education-grade">
                                <i class="bi bi-award"></i>
                                <span>Grade/CGPA: {{ $edu->grade }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-message">
                    <i class="bi bi-mortarboard"></i>
                    <h3>No Education Records Yet</h3>
                    <p>Add your academic qualifications from the Admin panel to showcase your educational background.</p>
                    <div class="tech-decoration">
                        <div class="code-line"></div>
                        <div class="code-line"></div>
                        <div class="code-line"></div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    
    <style>
        /* Section layout */
        .education {
            padding: 5rem 1rem;
            background: linear-gradient(to bottom, var(--bg-color), #120418);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        
        .education-content {
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        
        /* Enhanced header styling */
        .main-text { 
            text-align: center; 
            margin-bottom: 5rem;
            position: relative;
        }

        .main-text .animated-text { 
            color: var(--text-color); 
            font-size: 1.1rem; 
            font-weight: 700; 
            letter-spacing: 5px; 
            text-transform: uppercase;
            display: block;
            margin-bottom: 10px;
            position: relative;
            animation: fadeInDown 1s both;
        }

        .main-text .glow-text { 
            font-size: calc(var(--h2-font) + 0.5rem);
            margin: 15px 0; 
            color: var(--hover-color);
            text-shadow: var(--font-neon-box-shadow);
            animation: glow 3s infinite alternate;
            position: relative;
            display: inline-block;
        }

        @keyframes glow {
            0% {
                text-shadow: 0 0 10px rgba(18, 247, 255, 0.6),
                            0 0 20px rgba(18, 247, 255, 0.3);
            }
            100% {
                text-shadow: 0 0 20px rgba(18, 247, 255, 0.8),
                            0 0 30px rgba(18, 247, 255, 0.5),
                            0 0 40px rgba(18, 247, 255, 0.3);
            }
        }
        
        /* Divider styling */
        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1.5rem auto;
            width: 80%;
            max-width: 400px;
        }
        
        .divider-line {
            height: 2px;
            background: linear-gradient(to right, transparent, var(--hover-color), transparent);
            flex: 1;
        }
        
        .divider-icon {
            padding: 0 15px;
            font-size: 1.2rem;
            color: var(--hover-color);
        }
        
        /* Particles background */
        .particles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.5;
        }
        
        .particle {
            position: absolute;
            border-radius: 50%;
            background: var(--hover-color);
            box-shadow: 0 0 10px var(--hover-color), 0 0 20px var(--hover-color);
            animation: float 15s infinite linear;
        }
        
        .particle:nth-child(1) { width: 5px; height: 5px; top: 10%; left: 10%; animation-duration: 45s; }
        .particle:nth-child(2) { width: 8px; height: 8px; top: 20%; left: 80%; animation-duration: 30s; animation-delay: 2s; }
        .particle:nth-child(3) { width: 6px; height: 6px; top: 50%; left: 15%; animation-duration: 40s; animation-delay: 5s; }
        .particle:nth-child(4) { width: 4px; height: 4px; top: 70%; left: 90%; animation-duration: 35s; animation-delay: 1s; }
        .particle:nth-child(5) { width: 7px; height: 7px; top: 85%; left: 30%; animation-duration: 50s; animation-delay: 7s; }
        .particle:nth-child(6) { width: 5px; height: 5px; top: 40%; left: 60%; animation-duration: 45s; animation-delay: 3s; }
        .particle:nth-child(7) { width: 4px; height: 4px; top: 15%; left: 40%; animation-duration: 55s; animation-delay: 9s; }
        .particle:nth-child(8) { width: 6px; height: 6px; top: 90%; left: 70%; animation-duration: 40s; animation-delay: 4s; }
        
        @keyframes float {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 1;
            }
            25% {
                transform: translateY(-30vh) translateX(20vw) rotate(90deg);
                opacity: 0.8;
            }
            50% {
                transform: translateY(-10vh) translateX(40vw) rotate(180deg);
                opacity: 0.6;
            }
            75% {
                transform: translateY(30vh) translateX(20vw) rotate(270deg);
                opacity: 0.8;
            }
            100% {
                transform: translateY(0) translateX(0) rotate(360deg);
                opacity: 1;
            }
        }
        
        /* Education Cards */
        .education-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            animation: fadeIn 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Education Card */
        .education-card {
            background: rgba(18, 20, 26, 0.8);
            border: 2px solid var(--hover-color);
            border-radius: 15px;
            padding: 25px;
            display: flex;
            gap: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(18, 247, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: blur(5px);
            animation: cardAppear 0.5s ease-out forwards;
            animation-delay: calc(var(--index, 0) * 0.1s);
            opacity: 0;
        }
        
        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .education-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(18, 247, 255, 0.4);
        }
        
        .education-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent 0%, rgba(18, 247, 255, 0.1) 100%);
            z-index: -1;
        }
        
        .education-icon {
            flex: 0 0 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(18, 247, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--hover-color);
            border: 2px solid rgba(18, 247, 255, 0.2);
        }
        
        .education-details {
            flex: 1;
        }
        
        .education-details h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--hover-color);
            margin-bottom: 12px;
            position: relative;
            display: inline-block;
        }
        
        .education-details h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            height: 2px;
            width: 50px;
            background: linear-gradient(to right, var(--hover-color), transparent);
        }
        
        .education-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 15px;
        }
        
        .education-institute, .education-year, .education-grade {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-color);
            font-size: 14px;
        }
        
        .education-institute i, .education-year i, .education-grade i {
            color: var(--hover-color);
            font-size: 14px;
        }
        
        .present-tag {
            color: var(--hover-color);
            font-weight: 500;
        }
        
        /* Empty State */
        .empty-message {
            text-align: center;
            padding: 60px 30px;
            color: var(--text-color);
            background: rgba(18, 20, 26, 0.8);
            border: 2px solid var(--hover-color);
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(18, 247, 255, 0.2);
            animation: fadeIn 1s ease-out;
            grid-column: 1 / -1;
            backdrop-filter: blur(5px);
        }
        
        .empty-message i {
            font-size: 50px;
            color: var(--hover-color);
            margin-bottom: 20px;
            opacity: 0.8;
            text-shadow: 0 0 10px rgba(18, 247, 255, 0.5);
            animation: pulse 2s infinite alternate;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.8; }
            100% { transform: scale(1.1); opacity: 1; }
        }
        
        .empty-message h3 {
            font-size: 26px;
            color: var(--hover-color);
            margin-bottom: 15px;
        }
        
        .empty-message p {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto 25px;
            line-height: 1.6;
        }
        
        .tech-decoration {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }
        
        .code-line {
            height: 2px;
            background: linear-gradient(to right, transparent, rgba(18, 247, 255, 0.5), transparent);
            animation: expandLine 1.5s ease infinite alternate;
        }
        
        @keyframes expandLine {
            0% { width: 60px; }
            100% { width: 120px; }
        }
        
        .code-line:nth-child(1) { animation-delay: 0s; }
        .code-line:nth-child(2) { animation-delay: 0.5s; }
        .code-line:nth-child(3) { animation-delay: 1s; }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .education-cards {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .education {
                padding: 4rem 1rem;
            }
            
            .education-cards {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 1.5rem;
            }
            
            .main-text .glow-text {
                font-size: 2.5rem;
            }
            
            .main-text .animated-text {
                font-size: 0.9rem;
            }
        }
        
        @media (max-width: 576px) {
            .education-cards {
                grid-template-columns: 1fr;
            }
            
            .education-card {
                padding: 20px;
            }
            
            .main-text .glow-text {
                font-size: 2rem;
            }
        }
        
        /* Add animation to education cards on page load */
        .education-cards .education-card:nth-child(1) { --index: 1; }
        .education-cards .education-card:nth-child(2) { --index: 2; }
        .education-cards .education-card:nth-child(3) { --index: 3; }
        .education-cards .education-card:nth-child(4) { --index: 4; }
        .education-cards .education-card:nth-child(5) { --index: 5; }
        .education-cards .education-card:nth-child(6) { --index: 6; }
        .education-cards .education-card:nth-child(7) { --index: 7; }
        .education-cards .education-card:nth-child(8) { --index: 8; }
    </style>
    
    <!-- Add an animation script to enhance education cards on page load -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation delay to each education card for staggered entry
            const cards = document.querySelectorAll('.education-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = (index * 0.1) + 's';
            });
        });
    </script>
</section>

@endsection
