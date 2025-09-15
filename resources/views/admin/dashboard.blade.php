<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('style')
</head>
<body>
    @yield('main-Content')
</body>
</html>

@extends('index')
@push('style')
    <title>Admin Dashboard</title>
@endpush
@section('main-Content')
<header>
    <a href="{{ route('admin.dashboard') }}" style="text-decoration:none;"><div class="logo"><span style="color:#12f7ff">A</span><span style="color:white">dmin</span></div></a>
    <div style="display:flex;align-items:center;gap:20px;">
      <a href="/admin/profile" id="profile-btn" style="color:var(--text-color);font-weight:500;font-size:1rem;">Profile</a>
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit" id="logout-btn" style="background:none;border:none;cursor:pointer;color:var(--text-color);font-weight:500;font-size:1rem;">Logout</button>
      </form>
    </div>
    <div id="menu-icon" class="bi bi-list"></div>
    
    <style>
      #profile-btn, #logout-btn {
        transition: all 0.3s ease;
      }
      
      #profile-btn:hover, #logout-btn:hover {
        color: var(--hover-color);
        text-shadow: 0 0 10px rgba(18, 247, 255, 0.6),
                    0 0 20px rgba(18, 247, 255, 0.6),
                    0 0 30px rgba(18, 247, 255, 0.6),
                    0 0 40px rgba(18, 247, 255, 0.6);
      }
    </style>
</header>
<section class="services" id="admin">
    <div class="main-text">
      <span>WELCOME BACK</span>
      <h2 style="color:#12f7ff">Dashboard</h2>
    </div>
    <div class="dashboard-grid">
      <div class="dashboard-item">
        <i class="bi bi-journal-text"></i>
        <h3>Education</h3>
        <p>Manage your education items.</p>
        <a href="{{ route('education.index') }}" class="dashboard-btn">Open</a>
      </div>
      <div class="dashboard-item">
        <i class="bi bi-diagram-3"></i>
        <h3>Skills</h3>
        <p>Manage your skills.</p>
        <a href="{{ route('skills.index') }}" class="dashboard-btn">Open</a>
      </div>
      <div class="dashboard-item">
        <i class="bi bi-kanban"></i>
        <h3>Projects</h3>
        <p>Manage your projects.</p>
        <a href="{{ route('projects.index') }}" class="dashboard-btn">Open</a>
      </div>
      <div class="dashboard-item">
        <i class="bi bi-briefcase"></i>
        <h3>Experiences</h3>
        <p>Manage your experiences.</p>
        <a href="{{ route('experiences.index') }}" class="dashboard-btn">Open</a>
      </div>
      <div class="dashboard-item">
        <i class="bi bi-award"></i>
        <h3>Achievements</h3>
        <p>Manage your achievements.</p>
        <a href="{{ route('achievements.index') }}" class="dashboard-btn">Open</a>
      </div>
      <div class="dashboard-item">
        <i class="bi bi-info-circle"></i>
        <h3>Info</h3>
        <p>Manage your profile info.</p>
        <a href="{{ route('infos.index') }}" class="dashboard-btn">Open</a>
      </div>
      <div class="dashboard-item">
        <i class="bi bi-person"></i>
        <h3>Profile</h3>
        <p>Update your account and password.</p>
        <a href="{{ route('admin.profile') }}" class="dashboard-btn">Open</a>
      </div>
      <div class="dashboard-item">
        <i class="bi bi-person-lines-fill"></i>
        <h3>Personal Details</h3>
        <p>Manage personal details.</p>
        <a href="{{ route('personal_details.index') }}" class="dashboard-btn">Open</a>
      </div>
    </div>
    
    <style>
      .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
      }
      
      .dashboard-item {
        background: rgba(41, 46, 51, 0.7);
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        transition: all 0.4s ease;
        border: 1px solid rgba(18, 247, 255, 0.1);
        box-shadow: 0 0 20px rgba(18, 247, 255, 0.1);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
      
      .dashboard-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 0 25px rgba(18, 247, 255, 0.3);
        border-color: rgba(18, 247, 255, 0.3);
      }
      
      .dashboard-item i {
        font-size: 2.5rem;
        color: #12f7ff;
        margin-bottom: 15px;
      }
      
      .dashboard-item h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: white;
      }
      
      .dashboard-item p {
        color: #ccc;
        margin-bottom: 20px;
        font-size: 0.9rem;
      }
      
      .dashboard-btn {
        display: inline-block;
        padding: 10px 25px;
        background: transparent;
        color: #12f7ff;
        border: 1px solid #12f7ff;
        border-radius: 5px;
        font-weight: 500;
        transition: all 0.3s;
        text-decoration: none;
      }
      
      .dashboard-btn:hover {
        background: rgba(18, 247, 255, 0.1);
        box-shadow: 0 0 15px rgba(18, 247, 255, 0.5);
        transform: translateY(-3px);
      }
      
      @media screen and (max-width: 768px) {
        .dashboard-grid {
          grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        }
      }
    </style>
</section>
@endsection