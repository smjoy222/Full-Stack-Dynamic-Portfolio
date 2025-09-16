@extends('index')
@push('style')
    <title>Admin - Education</title>
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
<section class="services" id="education" style="padding-top:40px;min-height:70vh;background: linear-gradient(to bottom, var(--bg-color), #1a0718);">
  <div class="main-text" style="margin-bottom: 30px;">
    <span style="font-size: 1rem; letter-spacing: 2px; color: #888;">MANAGE</span>
    <h2 style="color:#12f7ff; font-size: 2.5rem; margin-top: 5px; text-shadow: 0 0 10px rgba(18, 247, 255, 0.5);">Education</h2>
  </div>
  <div style="margin: 0 auto; max-width: 1000px; display:flex; justify-content: flex-end;">
    <a href="{{ route('education.create') }}" class="add-button">
      <i class="bi bi-plus-circle"></i> Add Education
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

    .education-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 30px;
      max-width: 1000px;
      margin: 30px auto;
    }
    
    .education-card {
      background: rgba(41, 46, 51, 0.7);
      border-radius: 15px;
      padding: 25px;
      position: relative;
      transition: all 0.3s ease;
      border-top: 3px solid #12f7ff;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }
    
    .education-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(18, 247, 255, 0.2);
    }
    
    .education-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, transparent, rgba(18, 247, 255, 0.05));
      pointer-events: none;
    }
    
    .education-icon {
      font-size: 2rem;
      color: #12f7ff;
      background: rgba(18, 247, 255, 0.1);
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
      box-shadow: 0 0 15px rgba(18, 247, 255, 0.3);
    }
    
    .education-name {
      font-size: 1.5rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 10px;
    }
    
    .education-type {
      display: inline-block;
      background: rgba(18, 247, 255, 0.15);
      color: #12f7ff;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      margin-bottom: 15px;
    }
    
    .education-institute {
      font-size: 1rem;
      color: #ccc;
      margin-bottom: 5px;
    }
    
    .education-year {
      font-size: 0.9rem;
      color: #999;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    
    .education-year i {
      color: #12f7ff;
    }
    
    .education-grade {
      font-size: 1.1rem;
      color: #12f7ff;
      margin-bottom: 20px;
      font-weight: 600;
    }
    
    .education-actions {
      display: flex;
      gap: 15px;
      margin-top: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding-top: 15px;
    }
    
    .btn-edit, .btn-delete {
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
    }
    
    .btn-delete:hover {
      color: #ff6b81;
      text-shadow: 0 0 8px rgba(255, 71, 87, 0.6);
    }
  </style>
  
  <div class="education-grid">
    @foreach($items as $item)
    <div class="education-card">
      <div class="education-icon">
        <i class="bi bi-mortarboard"></i>
      </div>
      <div class="education-type">{{ $item->type }}</div>
      <h3 class="education-name">{{ $item->name }}</h3>
      <div class="education-institute">{{ $item->institute }}</div>
      <div class="education-year">
        <i class="bi bi-calendar3"></i> {{ $item->enrolled_year }} - {{ $item->passing_year ?? 'Present' }}
      </div>
      
      @if($item->grade)
      <div class="education-grade">
        <i class="bi bi-award"></i> Grade: {{ $item->grade }}
      </div>
      @endif
      
      <div class="education-actions">
        <a href="{{ route('education.edit', $item) }}" class="btn-edit">
          <i class="bi bi-pencil-square"></i> Edit
        </a>
        <form action="{{ route('education.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this education record?')">
          @csrf
          @method('DELETE')
          <button class="btn-delete">
            <i class="bi bi-trash3"></i> Delete
          </button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
  <div style="max-width:1000px;margin:20px auto;color:#bdbdbd">
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
