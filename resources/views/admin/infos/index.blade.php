@extends('index')
@push('style')
    <title>Admin - Info</title>
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
<section class="services" id="infos" style="padding-top:40px;min-height:70vh;background: linear-gradient(to bottom, var(--bg-color), #1a0718);">
  <div class="main-text" style="margin-bottom: 30px;">
    <span style="font-size: 1rem; letter-spacing: 2px; color: #888;">MANAGE</span>
    <h2 style="color:#12f7ff; font-size: 2.5rem; margin-top: 5px; text-shadow: 0 0 10px rgba(18, 247, 255, 0.5);">Info</h2>
  </div>
  <div style="margin: 0 auto; max-width: 1000px; display:flex; justify-content: flex-end;">
    <a href="{{ route('infos.create') }}" class="add-button">
      <i class="bi bi-plus-circle"></i> Add Info
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
    
    .info-container {
      max-width: 1000px;
      margin: 30px auto;
    }
    
    .info-cards {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
    }
    
    .info-card {
      background: rgba(41, 46, 51, 0.7);
      border-radius: 15px;
      overflow: hidden;
      position: relative;
      transition: all 0.3s ease;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
    }
    
    .info-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3), 0 0 20px rgba(18, 247, 255, 0.2);
    }
    
    .info-icon {
      position: absolute;
      top: 20px;
      right: 20px;
      width: 50px;
      height: 50px;
      background: rgba(18, 247, 255, 0.15);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .info-icon i {
      font-size: 1.8rem;
      color: #12f7ff;
      text-shadow: 0 0 10px rgba(18, 247, 255, 0.5);
    }
    
    .info-body {
      padding: 30px;
      flex-grow: 1;
    }
    
    .info-designation {
      font-size: 1.5rem;
      font-weight: 700;
      color: white;
      margin-bottom: 15px;
      padding-right: 60px;
    }
    
    .info-description {
      color: #ccc;
      line-height: 1.6;
      margin-bottom: 20px;
    }
    
    .info-stats {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: auto;
      margin-bottom: 15px;
    }
    
    .info-stat {
      background: rgba(18, 247, 255, 0.1);
      border-radius: 8px;
      padding: 10px 15px;
      flex-grow: 1;
    }
    
    .info-stat-value {
      color: #12f7ff;
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 5px;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    
    .info-stat-value i {
      font-size: 1.2rem;
    }
    
    .info-stat-label {
      color: #aaa;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .info-actions {
      display: flex;
      gap: 15px;
      padding-top: 15px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
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
  
  <div class="info-container">
    <div class="info-cards">
      @foreach($items as $item)
      <div class="info-card">
        <div class="info-icon">
          <i class="bi bi-info-circle"></i>
        </div>
        <div class="info-body">
          <h3 class="info-designation">{{ $item->designation }}</h3>
          <div class="info-description">{{ \Illuminate\Support\Str::limit($item->description, 150) }}</div>
          
          <div class="info-stats">
            <div class="info-stat">
              <div class="info-stat-value">
                <i class="bi bi-calendar-event"></i>
                {{ $item->created_at ? $item->created_at->format('Y') : 'N/A' }}
              </div>
              <div class="info-stat-label">Year</div>
            </div>
            
            <div class="info-stat">
              <div class="info-stat-value">
                <i class="bi bi-lightning"></i>
                {{ strlen($item->description) > 100 ? 'Detailed' : 'Brief' }}
              </div>
              <div class="info-stat-label">Type</div>
            </div>
          </div>
          
          <div class="info-actions">
            <a href="{{ route('infos.edit', $item) }}" class="btn-edit">
              <i class="bi bi-pencil-square"></i> Edit
            </a>
            <form action="{{ route('infos.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this info?')">
              @csrf
              @method('DELETE')
              <button class="btn-delete">
                <i class="bi bi-trash3"></i> Delete
              </button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
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
