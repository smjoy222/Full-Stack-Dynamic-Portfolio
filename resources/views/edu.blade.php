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
        /* Lightweight styles to match the project's card layout */
        .education { padding: 4rem 1rem; }
        .education-content { max-width: 1100px; margin: 0 auto; }
        .education-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; margin-top: 1.5rem; }
        .education-card { background: #0b0f1a; border: 1px solid #1e293b; border-radius: 12px; padding: 1.25rem; box-shadow: 0 4px 16px rgba(0,0,0,0.25); }
        .education-card h3 { margin: 0 0 .5rem; color: #e2e8f0; font-size: 1.125rem; }
        .education-card p { margin: .25rem 0; color: #94a3b8; }
        @media (prefers-color-scheme: light) {
            .education-card { background: #ffffff; border-color: #e5e7eb; }
            .education-card h3 { color: #111827; }
            .education-card p { color: #4b5563; }
        }
    </style>
</section>

@endsection
