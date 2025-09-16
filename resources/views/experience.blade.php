@extends('index')
@push('style')
    <title>Experience</title>
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

<!-- experience section -->
<section id="experience" class="experience">
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

    <div class="experience-content">
        <div class="main-text">
            <span class="animated-text">WORK EXPERIENCE</span>
            <h2 class="glow-text">My Professional Journey</h2>
            <div class="divider">
                <span class="divider-line"></span>
                <span class="divider-icon"><i class="bi bi-briefcase"></i></span>
                <span class="divider-line"></span>
            </div>
        </div>

        <div class="timeline-container">
            @forelse(($experiences ?? []) as $experience)
                <div class="timeline-item {{ $loop->iteration % 2 == 0 ? 'right' : 'left' }}">
                    <div class="timeline-dot">
                        <div class="pulse-effect"></div>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <i class="bi bi-calendar-event"></i>
                            {{ \Carbon\Carbon::parse($experience->from_date)->format('M Y') }} - 
                            @if($experience->to_date)
                                {{ \Carbon\Carbon::parse($experience->to_date)->format('M Y') }}
                            @else
                                <span class="present-tag">Present</span>
                            @endif
                        </div>
                        <h3>{{ $experience->position }}</h3>
                        <h4>{{ $experience->company }}</h4>
                        <div class="timeline-location">
                            <i class="bi bi-geo-alt"></i> {{ $experience->location ?? 'Remote' }}
                        </div>
                        <p>{{ $experience->description }}</p>
                        
                        <div class="timeline-type">
                            <span class="badge">{{ ucfirst($experience->type ?? 'job') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <h3>No Experience Records Yet</h3>
                    <p>Add your professional experiences from the Admin panel to showcase your career journey.</p>
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
        .experience { 
            padding: 5rem 1rem;
            background: linear-gradient(to bottom, var(--bg-color), #120418);
            position: relative;
            overflow: hidden;
            min-height: 100vh;
        }

        .experience-content { 
            max-width: 1200px; 
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

        /* Timeline layout with enhanced styling */
        .timeline-container {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 0;
            animation: fadeIn 1s ease-out;
        }

        .timeline-container::after {
            content: '';
            position: absolute;
            width: 4px;
            background: var(--hover-color);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
            box-shadow: 0 0 15px var(--hover-color);
            border-radius: 2px;
            animation: timelineGlow 3s infinite alternate;
        }
        
        @keyframes timelineGlow {
            0% {
                box-shadow: 0 0 10px var(--hover-color);
            }
            100% {
                box-shadow: 0 0 20px var(--hover-color), 0 0 30px rgba(18, 247, 255, 0.5);
            }
        }

        .timeline-item {
            padding: 30px 50px;
            position: relative;
            width: 50%;
            animation: fadeInUp 0.8s both;
            animation-delay: calc(var(--i, 0) * 0.2s);
        }
        
        .timeline-item:nth-child(1) { --i: 1; }
        .timeline-item:nth-child(2) { --i: 2; }
        .timeline-item:nth-child(3) { --i: 3; }
        .timeline-item:nth-child(4) { --i: 4; }
        .timeline-item:nth-child(5) { --i: 5; }

        .timeline-item.left {
            left: 0;
        }

        .timeline-item.right {
            left: 50%;
        }

        .timeline-dot {
            position: absolute;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--hover-color);
            top: 30px;
            box-shadow: 0 0 15px var(--hover-color);
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .pulse-effect {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(18, 247, 255, 0.2);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .timeline-item.left .timeline-dot {
            right: -11px;
        }

        .timeline-item.right .timeline-dot {
            left: -11px;
        }

        .timeline-content {
            padding: 25px 30px;
            background: rgba(18, 20, 26, 0.8);
            border: 2px solid var(--hover-color);
            position: relative;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(18, 247, 255, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(5px);
        }

        .timeline-content:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 25px rgba(18, 247, 255, 0.5);
            border-color: rgba(18, 247, 255, 1);
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 28px;
            width: 25px;
            height: 25px;
            border-top: 2px solid var(--hover-color);
            border-right: 2px solid var(--hover-color);
            background-color: rgba(18, 20, 26, 0.8);
            backdrop-filter: blur(5px);
            transition: all 0.4s ease;
        }
        
        .timeline-content:hover::before {
            border-color: rgba(18, 247, 255, 1);
        }

        .timeline-item.left .timeline-content::before {
            right: -15px;
            transform: rotate(45deg);
        }

        .timeline-item.right .timeline-content::before {
            left: -15px;
            transform: rotate(-135deg);
        }

        .timeline-date {
            color: var(--hover-color);
            font-size: 0.95rem;
            letter-spacing: 1px;
            margin-bottom: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 0;
        }
        
        .present-tag {
            background: rgba(18, 247, 255, 0.15);
            border-radius: 4px;
            padding: 2px 8px;
            font-size: 0.85rem;
        }

        .timeline-content h3 {
            margin: 0 0 8px;
            font-size: 1.5rem;
            color: white;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .timeline-content h4 {
            margin: 0 0 12px;
            color: var(--hover-color);
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .timeline-location {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #bdbdbd;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .timeline-content p {
            margin: 15px 0 20px;
            color: #d5d5d5;
            line-height: 1.7;
            font-size: 1rem;
        }
        
        .timeline-type {
            display: flex;
            justify-content: flex-end;
        }
        
        .badge {
            background: rgba(18, 247, 255, 0.1);
            border: 1px solid var(--hover-color);
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 0.8rem;
            color: var(--hover-color);
            display: inline-block;
        }
        
        /* Enhanced empty state styling */
        .empty-state {
            text-align: center;
            padding: 50px 30px;
            background: rgba(18, 20, 26, 0.6);
            border: 2px solid var(--hover-color);
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(18, 247, 255, 0.3);
            max-width: 600px;
            margin: 40px auto;
            position: relative;
            overflow: hidden;
            animation: fadeIn 1s ease-out;
            backdrop-filter: blur(10px);
        }
        
        .empty-icon {
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
        }
        
        .empty-icon::before {
            content: '';
            position: absolute;
            width: 120%;
            height: 120%;
            border-radius: 50%;
            border: 2px dashed var(--hover-color);
            animation: spin 20s linear infinite;
        }
        
        .empty-icon i {
            font-size: 3.5rem;
            color: var(--hover-color);
            animation: pulse 2s infinite alternate;
        }
        
        .empty-state h3 {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .empty-state p {
            color: #d5d5d5;
            font-size: 1.1rem;
            max-width: 400px;
            margin: 0 auto 30px;
            line-height: 1.6;
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
        .code-line:nth-child(3) { width: 30%; }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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

        /* Responsive layout */
        @media screen and (max-width: 768px) {
            .timeline-container::after {
                left: 40px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
                animation: fadeIn 0.8s both;
                animation-delay: calc(var(--i, 0) * 0.15s);
            }
            
            .timeline-item.right {
                left: 0;
            }
            
            .timeline-item.left .timeline-dot,
            .timeline-item.right .timeline-dot {
                left: 30px;
            }
            
            .timeline-item.left .timeline-content::before,
            .timeline-item.right .timeline-content::before {
                left: -15px;
                transform: rotate(-135deg);
                border-color: var(--hover-color);
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
            .experience {
                padding: 4rem 0.75rem;
            }
            
            .timeline-item {
                padding-left: 60px;
                padding-right: 15px;
            }
            
            .timeline-content {
                padding: 20px;
            }
            
            .empty-state {
                padding: 40px 20px;
            }
            
            .main-text {
                margin-bottom: 3rem;
            }
        }
    </style>
</section>

@endsection