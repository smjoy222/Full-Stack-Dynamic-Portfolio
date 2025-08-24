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
            @forelse(($educations ?? []) as $edu)
                <div class="education-card">
                    <h3>{{ $edu->type }} {{ $edu->name ? '— '.$edu->name : '' }}</h3>
                    <p><strong>Institute:</strong> {{ $edu->institute }}</p>
                    <p>
                        <strong>Year:</strong>
                        {{ $edu->enrolled_year }}
                        @if(!empty($edu->passing_year)) - {{ $edu->passing_year }} @else - Present @endif
                    </p>
                    @if(!empty($edu->grade))
                        <p><strong>Grade/CGPA:</strong> {{ $edu->grade }}</p>
                    @endif
                </div>
            @empty
                <div class="education-card">
                    <p>No education records found. Please add them from the Admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
    
    <style>
        /* Section layout */
        .education { padding: 4rem 1rem; }
        .education-content { max-width: 1100px; margin: 0 auto; }
        .education-content > h1,
        .education-content > p { text-align: center; }
        .education-content > h1 { font-size: var(--normal-font); margin-bottom: .25rem; }
        .education-content > p { color: #bdbdbd; }

        /* Cards grid */
        .education-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; margin-top: 1.5rem; }

        /* Neon card style, matching the Download CV aesthetic */
        .education-card {
            position: relative;
            background: var(--bg-color);
            border: 2px solid var(--hover-color);
            border-radius: 12px;
            padding: 1.25rem;
            box-shadow: var(--neon-box-shadow);
            outline: 3px solid var(--second-bg-color);
            transition: transform .2s ease, color .3s ease;
            overflow: hidden;
            z-index: 0;
        }
        .education-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 0; height: 100%;
            background: var(--hover-color);
            z-index: -1;
            transition: width .4s ease;
        }
        .education-card:hover { transform: translateY(-4px); }
        .education-card:hover::before { width: 100%; }
    .education-card:hover h3,
    .education-card:hover p,
    .education-card:hover p strong { color: var(--bg-color); }
        .education-card h3 { margin: 0 0 .5rem; color: var(--hover-color); font-size: 1.125rem; }
        .education-card p { margin: .25rem 0; color: #bdbdbd; }
        .education-card p strong { color: var(--text-color); }
    </style>
</section>

@endsection
