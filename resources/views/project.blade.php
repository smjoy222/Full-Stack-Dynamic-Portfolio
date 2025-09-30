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

            <div class="achievements-grid">
                @forelse(($projects ?? []) as $project)
                    <div class="achievement-card">
                        @if($project->images && count($project->images) > 0)
                            <div class="achievement-images">
                                <div class="image-wrapper">
                                    <img src="{{ asset('storage/' . $project->images[0]) }}" alt="{{ $project->name }}" class="achievement-image">
                                </div>
                            </div>
                        @endif
                        <div class="achievement-header">
                             <h3 class="achievement-title">{{ $project->name }}</h3>
                        </div>
                        <div class="achievement-details">
                           
                            <div class="achievement-meta">
                                @if($project->status)
                                    <span class="achievement-issuer">
                                        <i class="bi bi-check-circle"></i>
                                        {{ $project->status }}
                                    </span>
                                @endif
                                @if($project->type)
                                    <span class="achievement-issuer">
                                        <i class="bi bi-bookmark"></i>
                                        {{ $project->type }}
                                    </span>
                                @endif
                            </div>
                            
                            <p>{{ $project->description }}</p>
                            
                            @if($project->tools && count($project->tools) > 0)
                                <div class="project-tools">
                                    @foreach($project->tools as $tool)
                                        <span class="tool-tag">{{ $tool }}</span>
                                    @endforeach
                                </div>
                            @endif
                            
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" class="view-link" target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-github"></i>
                                    <span>GitHub</span>
                                </a>
                            @endif
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" class="view-link" target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-eye"></i>
                                    <span>Demo</span>
                                </a>
                            @endif
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

        .view-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--hover-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            background: rgba(18, 247, 255, 0.1);
            padding: 8px 16px;
            border-radius: 20px;
            border: 1px solid rgba(18, 247, 255, 0.2);
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .view-link:hover {
            transform: translateX(5px);
            box-shadow: 0 0 15px rgba(18, 247, 255, 0.3);
            background: rgba(18, 247, 255, 0.15);
        }
        
        /* Achievement Images Styling */
        .achievement-images {
            margin-bottom: 20px;
        }
        
        .image-wrapper {
            overflow: hidden;
            border-radius: 8px;
            border: 1px solid rgba(18, 247, 255, 0.3);
        }
        
        .achievement-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.5s ease;
        }
        
        .achievement-card:hover .achievement-image {
            transform: scale(1.1);
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
        
        .achievement-card:hover .tool-tag {
            background: rgba(18, 247, 255, 0.2);
            border-color: rgba(18, 247, 255, 0.4);
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
            .projects {
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
</section>
    
    <!-- Add an animation script to enhance project cards on page load -->
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

@endsection
