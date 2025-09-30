@extends('index')

@push('style')
    <title>Projects</title>
    <!-- Preload CSS resources -->
    <link rel="preload" href="{{ asset('assets/css/style.css') }}" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
    <style>
        .projects {
            position: relative;
            min-height: 100vh;
            padding: 120px 8% 70px;
            background: linear-gradient(to bottom, var(--bg-color), #120418);
            overflow: hidden;
        }
        
        .particles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        
        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: var(--hover-color);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }
        
        .particle:nth-child(1) { top: 10%; left: 10%; animation-duration: 20s; }
        .particle:nth-child(2) { top: 20%; left: 80%; animation-duration: 18s; animation-delay: 1s; }
        .particle:nth-child(3) { top: 60%; left: 20%; animation-duration: 15s; animation-delay: 2s; }
        .particle:nth-child(4) { top: 80%; left: 70%; animation-duration: 25s; animation-delay: 0s; }
        .particle:nth-child(5) { top: 30%; left: 30%; animation-duration: 22s; animation-delay: 3s; }
        .particle:nth-child(6) { top: 70%; left: 15%; animation-duration: 17s; animation-delay: 5s; }
        .particle:nth-child(7) { top: 40%; left: 90%; animation-duration: 19s; animation-delay: 4s; }
        .particle:nth-child(8) { top: 50%; left: 60%; animation-duration: 21s; animation-delay: 2s; }
        
        @keyframes float {
            0% { transform: translateY(0) translateX(0) rotate(0); opacity: 1; }
            50% { opacity: 0.7; }
            100% { transform: translateY(-100vh) translateX(100px) rotate(360deg); opacity: 1; }
        }
        
        .projects-content {
            position: relative;
            z-index: 1;
        }
        
        .main-text {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .animated-text {
            font-size: 16px;
            font-weight: 600;
            color: var(--hover-color);
            letter-spacing: 2px;
            display: block;
            margin-bottom: 10px;
            animation: slideRight 1s ease forwards;
        }
        
        .glow-text {
            font-size: 42px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(18, 247, 255, 0.3);
            animation: fadeIn 1s ease forwards;
        }
        
        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .divider-line {
            height: 3px;
            width: 80px;
            background-image: linear-gradient(to right, transparent, var(--hover-color), transparent);
            margin: 0 15px;
        }
        
        .divider-icon {
            color: var(--hover-color);
            font-size: 20px;
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .project-card {
            background: rgba(18, 20, 26, 0.8);
            border: 1px solid rgba(18, 247, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
            height: 100%;
        }
        
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(18, 247, 255, 0.15);
            border-color: rgba(18, 247, 255, 0.3);
        }
        
        .project-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--hover-color), transparent);
        }
        
        .project-image {
            width: 100%;
            height: 180px;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .project-card:hover .project-image img {
            transform: scale(1.05);
        }
        
        .project-details {
            flex: 1;
        }
        
        .project-details h3 {
            font-size: 20px;
            font-weight: 600;
            color: white;
            margin-bottom: 10px;
        }
        
        .project-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            font-size: 14px;
            color: #aaa;
            margin-bottom: 15px;
        }
        
        .project-status, .project-type {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .project-status i, .project-type i {
            color: var(--hover-color);
            font-size: 14px;
        }
        
        .project-tools {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 15px 0;
        }
        
        .tool-tag {
            background: rgba(18, 247, 255, 0.1);
            color: var(--hover-color);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .project-description {
            font-size: 14px;
            color: #ccc;
            line-height: 1.5;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .project-links {
            display: flex;
            gap: 15px;
            margin-top: auto;
        }
        
        .project-link {
            background: rgba(18, 247, 255, 0.1);
            color: var(--hover-color);
            padding: 8px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .project-link:hover {
            background: rgba(18, 247, 255, 0.2);
            transform: translateY(-2px);
        }
        
        .empty-message {
            text-align: center;
            padding: 50px 20px;
            color: #aaa;
            background: rgba(18, 20, 26, 0.8);
            border: 1px solid rgba(18, 247, 255, 0.1);
            border-radius: 15px;
        }
        
        .empty-message i {
            font-size: 48px;
            color: var(--hover-color);
            margin-bottom: 15px;
            opacity: 0.7;
        }
        
        .empty-message h3 {
            font-size: 24px;
            color: white;
            margin-bottom: 10px;
        }
        
        .empty-message p {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.5;
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
            background: linear-gradient(to right, transparent, rgba(18, 247, 255, 0.3), transparent);
        }
        
        .code-line:nth-child(1) { width: 80px; }
        .code-line:nth-child(2) { width: 120px; }
        .code-line:nth-child(3) { width: 60px; }
        
        @media (max-width: 992px) {
            .projects { padding: 100px 5% 50px; }
            .glow-text { font-size: 36px; }
            .projects-grid { grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); }
        }
        
        @media (max-width: 768px) {
            .projects { padding: 80px 4% 40px; }
            .glow-text { font-size: 30px; }
            .animated-text { font-size: 14px; }
        }
        
        @media (max-width: 480px) {
            .projects { padding: 70px 3% 30px; }
            .projects-grid { grid-template-columns: 1fr; }
        }
    </style>
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

    <!-- projects section -->
    <section id="projects" class="projects">
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

        <div class="projects-content">
            <div class="main-text">
                <span class="animated-text">PORTFOLIO & SHOWCASE</span>
                <h2 class="glow-text">My Projects</h2>
                <div class="divider">
                    <span class="divider-line"></span>
                    <span class="divider-icon"><i class="bi bi-code-square"></i></span>
                    <span class="divider-line"></span>
                </div>
            </div>

            <div class="projects-grid">
                @forelse(($projects ?? []) as $project)
                    <div class="project-card">
                        @if($project->images && count($project->images) > 0)
                            <div class="project-image">
                                <img src="{{ asset('storage/' . $project->images[0]) }}" alt="{{ $project->name }}">
                            </div>
                        @endif
                        <div class="project-details">
                            <h3>{{ $project->name }}</h3>
                            <div class="project-meta">
                                @if($project->status)
                                    <span class="project-status">
                                        <i class="bi bi-check-circle"></i>
                                        {{ $project->status }}
                                    </span>
                                @endif
                                @if($project->type)
                                    <span class="project-type">
                                        <i class="bi bi-bookmark"></i>
                                        {{ $project->type }}
                                    </span>
                                @endif
                            </div>
                            
                            <p class="project-description">{{ $project->description }}</p>
                            
                            @if($project->tools && count($project->tools) > 0)
                                <div class="project-tools">
                                    @foreach($project->tools as $tool)
                                        <span class="tool-tag">{{ $tool }}</span>
                                    @endforeach
                                </div>
                            @endif
                            
                            <div class="project-links">
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" class="project-link" target="_blank" rel="noopener noreferrer">
                                        <i class="bi bi-github"></i>
                                        <span>GitHub</span>
                                    </a>
                                @endif
                                @if($project->demo_url)
                                    <a href="{{ $project->demo_url }}" class="project-link" target="_blank" rel="noopener noreferrer">
                                        <i class="bi bi-eye"></i>
                                        <span>Demo</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-message">
                        <i class="bi bi-code-square"></i>
                        <h3>No Projects Yet</h3>
                        <p>Add your projects from the Admin panel to showcase your work, portfolio items, and development projects.</p>
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
            .projects {
                padding: 5rem 1rem;
                background: linear-gradient(to bottom, var(--bg-color), #120418);
                min-height: 100vh;
                position: relative;
                overflow: hidden;
            }
            
            .projects-content {
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

            /* Project Grid */
            .projects-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
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

            /* Project Card */
            .project-card {
                background: rgba(18, 20, 26, 0.8);
                border: 2px solid var(--hover-color);
                border-radius: 15px;
                padding: 25px;
                display: flex;
                flex-direction: column;
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

            .project-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 25px rgba(18, 247, 255, 0.4);
            }

            .project-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(135deg, transparent 0%, rgba(18, 247, 255, 0.1) 100%);
                z-index: -1;
            }

            .project-image {
                width: 100%;
                height: 180px;
                border-radius: 8px;
                overflow: hidden;
                margin-bottom: 20px;
                border: 1px solid rgba(18, 247, 255, 0.3);
            }
            
            .project-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }
            
            .project-card:hover .project-image img {
                transform: scale(1.1);
            }

            .project-details {
                flex: 1;
            }
            
            .project-details h3 {
                font-size: 22px;
                font-weight: 700;
                color: var(--hover-color);
                margin-bottom: 12px;
                position: relative;
                display: inline-block;
            }
            
            .project-details h3::after {
                content: '';
                position: absolute;
                left: 0;
                bottom: -5px;
                height: 2px;
                width: 50px;
                background: linear-gradient(to right, var(--hover-color), transparent);
            }

            .project-meta {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                font-size: 14px;
                color: #aaa;
                margin-bottom: 15px;
            }
            
            .project-status, .project-type {
                display: flex;
                align-items: center;
                gap: 5px;
            }
            
            .project-status i, .project-type i {
                color: var(--hover-color);
                font-size: 14px;
            }
            
            .project-description {
                font-size: 15px;
                color: var(--text-color);
                line-height: 1.6;
                margin-bottom: 20px;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            
            .project-tools {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                margin-bottom: 20px;
            }
            
            .tool-tag {
                background: rgba(18, 247, 255, 0.1);
                color: var(--hover-color);
                padding: 5px 12px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 500;
                border: 1px solid rgba(18, 247, 255, 0.2);
                transition: all 0.3s ease;
            }
            
            .project-card:hover .tool-tag {
                background: rgba(18, 247, 255, 0.2);
                border-color: rgba(18, 247, 255, 0.4);
            }
            
            .project-links {
                display: flex;
                gap: 15px;
                margin-top: auto;
            }
            
            .project-link {
                background: rgba(18, 247, 255, 0.1);
                color: var(--hover-color);
                padding: 8px 16px;
                border-radius: 20px;
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 14px;
                font-weight: 500;
                transition: all 0.3s ease;
                text-decoration: none;
                border: 1px solid rgba(18, 247, 255, 0.2);
            }
            
            .project-link:hover {
                background: rgba(18, 247, 255, 0.2);
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(18, 247, 255, 0.25);
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
                .projects-grid {
                    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                }
            }
            
            @media (max-width: 768px) {
                .projects {
                    padding: 4rem 1rem;
                }
                
                .projects-grid {
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
                .projects-grid {
                    grid-template-columns: 1fr;
                }
                
                .project-card {
                    padding: 20px;
                }
                
                .main-text .glow-text {
                    font-size: 2rem;
                }
            }
            
            /* Add animation to project cards on page load */
            .projects-grid .project-card:nth-child(1) { --index: 1; }
            .projects-grid .project-card:nth-child(2) { --index: 2; }
            .projects-grid .project-card:nth-child(3) { --index: 3; }
            .projects-grid .project-card:nth-child(4) { --index: 4; }
            .projects-grid .project-card:nth-child(5) { --index: 5; }
            .projects-grid .project-card:nth-child(6) { --index: 6; }
            .projects-grid .project-card:nth-child(7) { --index: 7; }
            .projects-grid .project-card:nth-child(8) { --index: 8; }
            .projects-grid .project-card:nth-child(9) { --index: 9; }
            .projects-grid .project-card:nth-child(10) { --index: 10; }
    </style>
</section>
    
    <!-- Add an animation script to enhance project cards on page load -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation delay to each project card for staggered entry
            const cards = document.querySelectorAll('.project-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = (index * 0.1) + 's';
            });
        });
    </script>

@endsection
