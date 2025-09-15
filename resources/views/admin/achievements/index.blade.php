@extends('index')
@push('style')
    <title>Admin - Achievements</title>
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
<section class="services" id="achievements" style="padding-top:40px;min-height:70vh">
  <div class="main-text">
    <span>MANAGE</span>
    <h2 style="color:#12f7ff">Achievements</h2>
  </div>
  <div style="margin: 0 auto; max-width: 1000px; display:flex; justify-content: flex-end;">
    <a href="{{ route('achievements.create') }}" class="add-button">
      <i class="bi bi-plus-lg"></i> Add Achievement
    </a>
  </div>
  
  <style>
    .add-button {
      background: #12f7ff;
      color: #250821;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      box-shadow: 0 0 15px rgba(18, 247, 255, 0.4);
      margin-bottom: 20px;
    }
    
    .add-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 0 20px rgba(18, 247, 255, 0.6);
      background: #00e6ff;
    }
    
    .add-button i {
      font-size: 1.2rem;
    }
  </style>
  <div class="section-services" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;max-width:1000px;margin:20px auto">
    @foreach($items as $item)
    <div class="service-box">
      <i class="bi bi-award service-icon"></i>
      <h3>{{ $item->name }}</h3>
      <p>{{ $item->organization }} {{ $item->date ? '(' . $item->date->format('Y-m-d') . ')' : '' }}</p>
      <div style="display:flex;gap:10px">
        <a href="{{ route('achievements.edit', $item) }}" class="read">Edit</a>
        <form action="{{ route('achievements.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete?')">
          @csrf
          @method('DELETE')
          <button class="read" style="background:none;border:none;color:var(--hover-color);cursor:pointer">Delete</button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
  <div style="max-width:1000px;margin:0 auto;color:#bdbdbd">
    {{ $items->links() }}
  </div>
</section>
@endsection
