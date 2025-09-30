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

        <div class="achievements-grid">
            @forelse(($educations ?? []) as $edu)
                <div class="achievement-card">
                    <div class="achievement-header">
                        <div class="achievement-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h3 class="achievement-title">{{ $edu->type }} {{ $edu->name ? '— '.$edu->name : '' }}</h3>
                    </div>
                    <div class="achievement-details">
                        <div class="achievement-meta">
                            <span class="achievement-issuer">
                                <i class="bi bi-building"></i>
                                {{ $edu->institute }}
                            </span>
                            <span class="achievement-date">
                                <i class="bi bi-calendar-event"></i>
                                {{ $edu->enrolled_year }}
                                @if(!empty($edu->passing_year)) - {{ $edu->passing_year }} @else - <span class="present-tag">Present</span> @endif
                            </span>
                        </div>
                        @if(!empty($edu->grade))
                            <p>Grade/CGPA: {{ $edu->grade }}</p>
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

        /* Achievement Grid */
        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            animation: fadeIn 1s ease-out;
        }

        /* Achievement Card */
        .achievement-card {
            background: rgba(18, 20, 26, 0.8);
            border: 2px solid var(--hover-color);
            border-radius: 15px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(18, 247, 255, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            opacity: 0;
            animation: cardAppear 0.5s ease-out forwards;
            animation-delay: calc(var(--index, 0) * 0.1s);
        }
        
        .achievement-card:nth-child(1) { --index: 1; }
        .achievement-card:nth-child(2) { --index: 2; }
        .achievement-card:nth-child(3) { --index: 3; }
        .achievement-card:nth-child(4) { --index: 4; }
        .achievement-card:nth-child(5) { --index: 5; }
        .achievement-card:nth-child(6) { --index: 6; }
        .achievement-card:nth-child(7) { --index: 7; }
        .achievement-card:nth-child(8) { --index: 8; }
        
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

        .achievement-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent 0%, rgba(18, 247, 255, 0.1) 100%);
            z-index: -1;
            transition: all 0.3s ease;
            opacity: 0;
        }

        .achievement-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(18, 247, 255, 0.4);
            background: linear-gradient(135deg, rgba(18, 20, 26, 0.9) 0%, rgba(18, 247, 255, 0.15) 100%);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease, background 0.3s ease;
        }

        .achievement-card:hover::before {
            opacity: 1;
        }
        
        .achievement-card:hover .achievement-title::after {
            width: 100%;
            transition: width 0.3s ease;
        }

        .achievement-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }
        
        .achievement-icon {
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
            box-shadow: 0 0 15px rgba(18, 247, 255, 0.3);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .achievement-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--hover-color);
            margin-bottom: 0;
            position: relative;
            display: inline-block;
        }
        
        .achievement-icon::before {
            content: '';
            position: absolute;
            width: 120%;
            height: 120%;
            border-radius: 50%;
            border: 1px dashed var(--hover-color);
            animation: spin 20s linear infinite;
        }

        .achievement-icon i {
            font-size: 2.5rem;
            color: var(--hover-color);
            animation: pulse 2s infinite alternate;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes pulse {
            0% { 
                transform: scale(1); 
                opacity: 1;
            }
            100% { 
                transform: scale(1.2); 
                opacity: 0.8; 
            }
        }

        .achievement-details {
            flex: 1;
            position: relative;
            z-index: 1;
            background: rgba(18, 20, 26, 0.5);
            border-radius: 10px;
            padding: 15px;
            border: 1px solid rgba(18, 247, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .achievement-card:hover .achievement-details {
            background: rgba(18, 20, 26, 0.7);
            border: 1px solid rgba(18, 247, 255, 0.3);
            box-shadow: 0 5px 15px rgba(18, 247, 255, 0.15);
        }

        .achievement-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            height: 2px;
            width: 50px;
            background: linear-gradient(to right, var(--hover-color), transparent);
            transition: width 0.3s ease;
        }

        .achievement-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 15px;
            background: rgba(18, 20, 26, 0.3);
            border-radius: 8px;
            padding: 10px;
            border: 1px solid rgba(18, 247, 255, 0.05);
        }

        .achievement-date, .achievement-issuer {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-color);
            font-size: 14px;
            padding: 5px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .achievement-card:hover .achievement-date,
        .achievement-card:hover .achievement-issuer {
            background: rgba(18, 247, 255, 0.05);
        }
        
        .achievement-date i, .achievement-issuer i {
            color: var(--hover-color);
            font-size: 14px;
        }

        .achievement-details p {
            color: var(--text-color);
            margin-bottom: 20px;
            line-height: 1.6;
            font-size: 15px;
            padding: 10px;
            transition: all 0.3s ease;
        }
        
        .achievement-card:hover .achievement-details p {
            color: var(--text-color);
        }
        
        .present-tag {
            color: var(--hover-color);
            font-weight: 500;
        }

        /* Enhanced empty state styling */
        .empty-message {
            text-align: center;
            padding: 50px 30px;
            background: rgba(18, 20, 26, 0.6);
            border: 2px solid var(--hover-color);
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(18, 247, 255, 0.3);
            grid-column: 1 / -1;
            max-width: 600px;
            margin: 40px auto;
            position: relative;
            overflow: hidden;
            animation: fadeIn 1s ease-out;
            backdrop-filter: blur(10px);
        }
        
            .empty-message i {
            width: 100px;
            height: 100px;
            margin: 0 auto 30px;
            border-radius: 50%;
            background: linear-gradient(145deg, rgba(18, 247, 255, 0.1), rgba(18, 247, 255, 0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border: 2px solid rgba(18, 247, 255, 0.3);
            font-size: 3.5rem;
            color: var(--hover-color);
            animation: pulse 2s infinite alternate;
        }
        
        .tech-decoration {
            margin-top: 30px;
        }
        
        .code-line {
            height: 4px;
            background: linear-gradient(to right, transparent, var(--hover-color), transparent);
            margin: 10px auto;
            width: 60%;
            opacity: 0.5;
        }
        
        .code-line:nth-child(1) { width: 40%; }
        .code-line:nth-child(2) { width: 60%; }
        .code-line:nth-child(3) { width: 30%; }        .empty-message i::before {
            content: '';
            position: absolute;
            width: 120%;
            height: 120%;
            border-radius: 50%;
            border: 2px dashed var(--hover-color);
            animation: spin 20s linear infinite;
        }
        
        .empty-message h3 {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .empty-message p {
            color: #d5d5d5;
            font-size: 1.1rem;
            max-width: 400px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Enhanced hover animations */
        .achievement-card.card-hover .achievement-title::after {
            width: 100%;
        }
        
        .achievement-card.card-hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(18, 247, 255, 0.4);
            background: linear-gradient(135deg, rgba(18, 20, 26, 0.9) 0%, rgba(18, 247, 255, 0.15) 100%);
        }
        
        .achievement-card.card-hover .achievement-icon {
            background: rgba(18, 247, 255, 0.2);
            box-shadow: 0 0 20px rgba(18, 247, 255, 0.5);
            transform: scale(1.1);
        }
        
        .achievement-card.card-leaving {
            transition: all 0.3s ease;
        }
        
        /* Responsive tweaks */
        @media (max-width: 768px) {
            .achievements-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .main-text .glow-text {
                font-size: calc(var(--h2-font) - 0.2rem);
            }
            
            .divider {
                width: 95%;
            }
        }
        
        /* Animations for smaller screens */
        @media screen and (max-width: 480px) {
            .education {
                padding: 4rem 0.75rem;
            }
            
            .achievement-card {
                padding: 20px;
            }
            
            .empty-message {
                padding: 40px 20px;
            }
            
            .main-text {
                margin-bottom: 3rem;
            }
        }
    </style>
    
    <!-- Add animation and modal scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation delay to each achievement card for staggered entry
            const cards = document.querySelectorAll('.achievement-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = (index * 0.1) + 's';
                card.style.setProperty('--index', index + 1);
            });
            
            // Add hover effect class for better animation handling
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.classList.add('card-hover');
                });
                
                card.addEventListener('mouseleave', () => {
                    card.classList.add('card-leaving');
                    setTimeout(() => {
                        card.classList.remove('card-hover');
                        card.classList.remove('card-leaving');
                    }, 300);
                });
            });
        });
    </script>
</section>

@endsection
