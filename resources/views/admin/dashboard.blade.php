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
    <div class="logo"><span>A</span>dmin</div>
    <ul class="navlist">
  <li><a href="/admin/profile">Profile</a></li>
    <li>
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit" class="read" style="background:none;border:1px solid var(--hover-color);padding:8px 16px;color:var(--hover-color);border-radius:8px;cursor:pointer">Logout</button>
      </form>
    </li>
    </ul>
    <div id="menu-icon" class="bi bi-list"></div>
</header>
<section class="services" id="admin">
    <div class="main-text">
      <span>Welcome back</span>
      <h2>Dashboard</h2>
    </div>
    <div class="section-services">
      <div class="service-box">
        <i class="bi bi-journal-text service-icon"></i>
        <h3>Education</h3>
        <p>Manage your education items.</p>
        <a href="{{ route('education.index') }}" class="read">Open</a>
      </div>
      <div class="service-box">
        <i class="bi bi-diagram-3 service-icon"></i>
        <h3>Skills</h3>
        <p>Manage your skills.</p>
        <a href="{{ route('skills.index') }}" class="read">Open</a>
      </div>
      <div class="service-box">
        <i class="bi bi-kanban service-icon"></i>
        <h3>Projects</h3>
        <p>Manage your projects.</p>
        <a href="{{ route('projects.index') }}" class="read">Open</a>
      </div>
      <div class="service-box">
        <i class="bi bi-briefcase service-icon"></i>
        <h3>Experiences</h3>
        <p>Manage your experiences.</p>
        <a href="{{ route('experiences.index') }}" class="read">Open</a>
      </div>
      <div class="service-box">
        <i class="bi bi-award service-icon"></i>
        <h3>Achievements</h3>
        <p>Manage your achievements.</p>
        <a href="{{ route('achievements.index') }}" class="read">Open</a>
      </div>
      <div class="service-box">
        <i class="bi bi-info-circle service-icon"></i>
        <h3>Info</h3>
        <p>Manage your profile info.</p>
        <a href="{{ route('infos.index') }}" class="read">Open</a>
      </div>
      <div class="service-box">
        <i class="bi bi-person service-icon"></i>
        <h3>Profile</h3>
        <p>Update your account and password.</p>
        <a href="{{ route('admin.profile') }}" class="read">Open</a>
      </div>
      <div class="service-box">
        <i class="bi bi-person-lines-fill service-icon"></i>
        <h3>Personal Details</h3>
        <p>Manage personal details.</p>
        <a href="{{ route('personal_details.index') }}" class="read">Open</a>
      </div>
    </div>
</section>
@endsection