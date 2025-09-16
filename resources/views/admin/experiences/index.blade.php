@extends('index')
@push('style')
    <title>Admin - Experiences</title>
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
<section class="services" id="experiences" style="padding-top:40px;min-height:70vh;background: linear-gradient(to bottom, var(--bg-color), #1a0718);">
  <div class="main-text" style="margin-bottom: 30px;">
    <span style="font-size: 1rem; letter-spacing: 2px; color: #888;">MANAGE</span>
    <h2 style="color:#12f7ff; font-size: 2.5rem; margin-top: 5px; text-shadow: 0 0 10px rgba(18, 247, 255, 0.5);">Experiences</h2>
  </div>
  <div style="margin: 0 auto; max-width: 1000px; display:flex; justify-content: flex-end;">
    <a href="{{ route('experiences.create') }}" class="add-button">
      <i class="bi bi-plus-circle"></i> Add Experience
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
    
    .experience-timeline {
      max-width: 1000px;
      margin: 30px auto;
      position: relative;
    }
    
    .experience-timeline::before {
      content: '';
      position: absolute;
      height: calc(100% - 40px);
      width: 4px;
      background: linear-gradient(to bottom, #12f7ff, rgba(18, 247, 255, 0.1));
      left: 50%;
      transform: translateX(-50%);
      top: 20px;
      border-radius: 2px;
    }
    
    .experience-card {
      width: calc(50% - 30px);
      background: rgba(41, 46, 51, 0.7);
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      position: relative;
      margin-bottom: 40px;
      transition: all 0.3s ease;
    }
    
    .experience-card:nth-child(odd) {
      margin-left: auto;
      margin-right: 30px;
    }
    
    .experience-card:nth-child(even) {
      margin-left: 30px;
    }
    
    .experience-card:nth-child(odd)::before {
      content: '';
      position: absolute;
      left: -35px;
      top: 20px;
      width: 35px;
      height: 4px;
      background: linear-gradient(to left, #12f7ff, rgba(18, 247, 255, 0.1));
    }
    
    .experience-card:nth-child(even)::before {
      content: '';
      position: absolute;
      right: -35px;
      top: 20px;
      width: 35px;
      height: 4px;
      background: linear-gradient(to right, #12f7ff, rgba(18, 247, 255, 0.1));
    }
    
    .experience-card::after {
      content: '';
      position: absolute;
      width: 16px;
      height: 16px;
      background: #12f7ff;
      top: 14px;
      border-radius: 50%;
      box-shadow: 0 0 10px rgba(18, 247, 255, 0.8);
    }
    
    .experience-card:nth-child(odd)::after {
      left: -43px;
    }
    
    .experience-card:nth-child(even)::after {
      right: -43px;
    }
    
    .experience-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3), 0 0 15px rgba(18, 247, 255, 0.1);
    }
    
    .experience-date {
      position: absolute;
      top: -10px;
      background: linear-gradient(90deg, rgba(18, 247, 255, 0.2), transparent);
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.8rem;
      color: #12f7ff;
      font-weight: 600;
    }
    
    .experience-card:nth-child(odd) .experience-date {
      right: 20px;
    }
    
    .experience-card:nth-child(even) .experience-date {
      left: 20px;
    }
    
    .experience-role {
      font-size: 1.4rem;
      font-weight: 700;
      color: #fff;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    
    .experience-company {
      font-size: 1.1rem;
      font-weight: 500;
      color: #12f7ff;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    
    .experience-company i {
      font-size: 1.2rem;
    }
    
    .experience-description {
      color: #ccc;
      margin-bottom: 15px;
      line-height: 1.5;
    }
    
    .experience-actions {
      display: flex;
      gap: 15px;
      margin-top: 20px;
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
    
    @media screen and (max-width: 768px) {
      .experience-timeline::before {
        left: 30px;
      }
      
      .experience-card {
        width: calc(100% - 60px);
        margin-left: 60px !important;
        margin-right: 0 !important;
      }
      
      .experience-card:nth-child(odd)::before,
      .experience-card:nth-child(even)::before {
        left: -30px;
        right: auto;
        width: 30px;
        background: linear-gradient(to right, rgba(18, 247, 255, 0.1), #12f7ff);
      }
      
      .experience-card:nth-child(odd)::after,
      .experience-card:nth-child(even)::after {
        left: -38px;
        right: auto;
      }
      
      .experience-card:nth-child(odd) .experience-date,
      .experience-card:nth-child(even) .experience-date {
        left: 20px;
        right: auto;
      }
    }
  </style>
  
  <div class="experience-timeline">
    @foreach($items as $item)
    <div class="experience-card">
      <div class="experience-date">
        {{ optional($item->from_date)->format('M Y') }} - {{ optional($item->to_date)->format('M Y') ?: 'Present' }}
      </div>
      <h3 class="experience-role">{{ $item->designation }}</h3>
      <div class="experience-company">
        <i class="bi bi-building"></i> {{ $item->organization }}
      </div>
      <p class="experience-description">{{ $item->description ?? 'No description provided.' }}</p>
      <div class="experience-actions">
        <a href="{{ route('experiences.edit', $item) }}" class="btn-edit">
          <i class="bi bi-pencil-square"></i> Edit
        </a>
        <form action="{{ route('experiences.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this experience?')">
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
