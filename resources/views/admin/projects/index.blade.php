@extends('index')
@push('style')
    <title>Admin - Projects</title>
@endpush
@section('main-Content')
<header>
  <a href="{{ route('admin.dashboard') }}" style="text-decoration:none;"><div class="logo"><span style="color:#12f7ff">A</span><span style="color:white">dmin</span></div></a>
  <div style="display:flex;align-items:center;gap:20px;">
    <a href="/admin" id="dashboard-btn" style="color:var(--text-color);font-weight:500;font-size:1rem;">Dashboard</a>
    <a href="{{ route('admin.profile') }}" id="profile-btn" style="color:var(--text-color);font-weight:500;font-size:1rem;">Profile</a>
    <form method="POST" action="{{ route('logout') }}" style="display:inline">
      @csrf
      <button type="submit" id="logout-btn" style="background:none;border:none;cursor:pointer;color:var(--text-color);font-weight:500;font-size:1rem;">Logout</button>
    </form>
  </div>
  <div id="menu-icon" class="bi bi-list"></div>
  
  <style>
    #dashboard-btn, #profile-btn, #logout-btn {
      transition: all 0.3s ease;
    }
    
    #dashboard-btn:hover, #profile-btn:hover, #logout-btn:hover {
      color: var(--hover-color);
      text-shadow: 0 0 10px rgba(18, 247, 255, 0.6),
                  0 0 20px rgba(18, 247, 255, 0.6),
                  0 0 30px rgba(18, 247, 255, 0.6),
                  0 0 40px rgba(18, 247, 255, 0.6);
    }
  </style>
</header>
<section class="services" id="projects" style="padding-top:40px;min-height:70vh;background: linear-gradient(to bottom, var(--bg-color), #1a0718);">
  <div class="main-text" style="margin-bottom: 30px;">
    <span style="font-size: 1rem; letter-spacing: 2px; color: #888;">MANAGE</span>
    <h2 style="color:#12f7ff; font-size: 2.5rem; margin-top: 5px; text-shadow: 0 0 10px rgba(18, 247, 255, 0.5);">Projects</h2>
  </div>
  <div style="margin: 0 auto; max-width: 1100px; display:flex; justify-content: flex-end;">
    <a href="{{ route('projects.create') }}" class="add-button">
      <i class="bi bi-plus-circle"></i> Add Project
    </a>
  </div>
  
  <style>
    .add-button {
      background: linear-gradient(to right, #12f7ff, #06c4cc);
      color: #250821;
      padding: 12px 25px;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(18, 247, 255, 0.4);
      margin-bottom: 30px;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-size: 0.9rem;
      position: relative;
      overflow: hidden;
    }
    
    .add-button::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to right, transparent, rgba(255,255,255,0.2), transparent);
      transform: translateX(-100%);
      transition: transform 0.5s ease;
    }
    
    .add-button:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(18, 247, 255, 0.6);
    }
    
    .add-button:hover::after {
      transform: translateX(100%);
    }
    
    .add-button i {
      font-size: 1.2rem;
    }
    
    .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 30px;
      max-width: 1100px;
      margin: 30px auto;
    }
    
    .project-card {
      background: rgba(41, 46, 51, 0.7);
      border-radius: 15px;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      position: relative;
    }
    
    .project-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3), 0 0 20px rgba(18, 247, 255, 0.2);
    }
    
    .project-header {
      height: 160px;
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, #12f7ff20, #250821);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .project-header .project-icon {
      font-size: 4rem;
      color: rgba(18, 247, 255, 0.8);
      text-shadow: 0 0 15px rgba(18, 247, 255, 0.6);
    }
    
    .project-body {
      padding: 25px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    
    .project-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 15px;
      line-height: 1.3;
    }
    
    .project-description {
      color: #ccc;
      margin-bottom: 20px;
      line-height: 1.5;
      flex-grow: 1;
    }
    
    .project-tech {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 20px;
    }
    
    .tech-tag {
      background: rgba(18, 247, 255, 0.1);
      color: #12f7ff;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 600;
    }
    
    .project-actions {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      padding-top: 15px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .project-btn {
      padding: 8px 15px;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.3s ease;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    
    .btn-edit {
      background: rgba(18, 247, 255, 0.15);
      color: #12f7ff;
    }
    
    .btn-edit:hover {
      background: rgba(18, 247, 255, 0.25);
      box-shadow: 0 0 10px rgba(18, 247, 255, 0.3);
    }
    
    .btn-delete {
      background: none;
      border: none;
      color: #ff4757;
      cursor: pointer;
      padding: 8px 15px;
    }
    
    .btn-delete:hover {
      color: #ff6b81;
      text-shadow: 0 0 8px rgba(255, 71, 87, 0.6);
    }
    
    .btn-github {
      background: rgba(100, 88, 255, 0.15);
      color: #7167ff;
    }
    
    .btn-github:hover {
      background: rgba(100, 88, 255, 0.25);
      box-shadow: 0 0 10px rgba(100, 88, 255, 0.3);
    }
    
    .btn-demo {
      background: rgba(255, 133, 27, 0.15);
      color: #ff851b;
    }
    
    .btn-demo:hover {
      background: rgba(255, 133, 27, 0.25);
      box-shadow: 0 0 10px rgba(255, 133, 27, 0.3);
    }
  </style>
  
  <div class="projects-grid">
    @foreach($items as $item)
    <div class="project-card">
      <div class="project-header">
        <i class="bi bi-code-square project-icon"></i>
      </div>
      <div class="project-body">
        <h3 class="project-title">{{ $item->name }}</h3>
        <p class="project-description">{{ \Illuminate\Support\Str::limit($item->description, 120) }}</p>
        
        @if($item->tech_stack)
        <div class="project-tech">
          @foreach(explode(',', $item->tech_stack) as $tech)
            <span class="tech-tag">{{ trim($tech) }}</span>
          @endforeach
        </div>
        @endif
        
        <div class="project-actions">
          <a href="{{ route('projects.edit', $item) }}" class="project-btn btn-edit">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
          <form action="{{ route('projects.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
            @csrf
            @method('DELETE')
            <button class="btn-delete">
              <i class="bi bi-trash3"></i> Delete
            </button>
          </form>
          @if($item->github_url)
            <a href="{{ $item->github_url }}" class="project-btn btn-github" target="_blank">
              <i class="bi bi-github"></i> GitHub
            </a>
          @endif
          @if($item->demo_url)
            <a href="{{ $item->demo_url }}" class="project-btn btn-demo" target="_blank">
              <i class="bi bi-box-arrow-up-right"></i> Demo
            </a>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
  
  <div style="max-width:1100px;margin:20px auto;color:#bdbdbd">
    <div class="pagination-wrapper">
      {{ $items->links() }}
    </div>
  </div>
  
  <style>
    .pagination-wrapper {
      display: flex;
      justify-content: center;
    }
    
    .pagination-wrapper nav > div {
      box-shadow: 0 0 15px rgba(18, 247, 255, 0.1);
      border-radius: 10px;
      padding: 10px;
      background: rgba(41, 46, 51, 0.5);
    }
    
    .pagination-wrapper .relative.z-0.inline-flex.shadow-sm.rounded-md .relative.inline-flex.items-center.px-4.py-2 {
      color: #12f7ff !important;
    }
    
    .pagination-wrapper button:hover {
      background: rgba(18, 247, 255, 0.1) !important;
    }
    
    .pagination-wrapper span[aria-current="page"] span {
      background: rgba(18, 247, 255, 0.2) !important;
      border-color: #12f7ff !important;
    }
  </style>
</section>
@endsection
