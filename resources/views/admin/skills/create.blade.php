@extends('index')
@push('style')
    <title>Create Skill</title>
@endpush
@section('main-Content')
<header>
  <a href="{{ route('admin.dashboard') }}" style="text-decoration:none;"><div class="logo"><span style="color:#12f7ff">A</span><span style="color:white">dmin</span></div></a>
  <div style="display:flex;align-items:center;gap:20px;">
    <a href="{{ route('skills.index') }}" id="back-btn" style="color:var(--text-color);font-weight:500;font-size:1rem;">Back</a>
    <a href="{{ route('admin.profile') }}" id="profile-btn" style="color:var(--text-color);font-weight:500;font-size:1rem;">Profile</a>
    <form method="POST" action="{{ route('logout') }}" style="display:inline">
      @csrf
      <button type="submit" id="logout-btn" style="background:none;border:none;cursor:pointer;color:var(--text-color);font-weight:500;font-size:1rem;">Logout</button>
    </form>
  </div>
  <div id="menu-icon" class="bi bi-list"></div>
  
  <style>
    #back-btn, #profile-btn, #logout-btn {
      transition: all 0.3s ease;
    }
    
    #back-btn:hover, #profile-btn:hover, #logout-btn:hover {
      color: var(--hover-color);
      text-shadow: 0 0 10px rgba(18, 247, 255, 0.6),
                  0 0 20px rgba(18, 247, 255, 0.6),
                  0 0 30px rgba(18, 247, 255, 0.6),
                  0 0 40px rgba(18, 247, 255, 0.6);
    }
  </style>
</header>
<section class="contact" style="padding-top:80px;min-height:70vh">
  <div class="main-text">
    <span>NEW</span>
    <h2 style="color:#12f7ff">Add Skill</h2>
  </div>
  <div class="container" style="max-width:700px;margin:0 auto;background:rgba(41, 46, 51, 0.7);border-radius:10px;padding:30px;box-shadow:0 0 20px rgba(18, 247, 255, 0.2);border:1px solid rgba(18, 247, 255, 0.1)">
    <form method="POST" action="{{ route('skills.store') }}" class="form" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:20px">
      @csrf
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Skill Name</label>
        <input name="name" placeholder="Enter skill name" value="{{ old('name') }}" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
      </div>
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Skill Type</label>
        <select name="type" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
          <option value="technical" @selected(old('type')==='technical')>Technical</option>
          <option value="professional" @selected(old('type')==='professional')>Professional</option>
        </select>
      </div>
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Skill Level (%)</label>
        <input type="number" name="level" min="0" max="100" placeholder="Enter skill level (0-100)" value="{{ old('level', 75) }}" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
        <div class="level-preview">
          <div class="preview-container" style="margin-top:15px;width:100%;height:10px;background:rgba(255,255,255,0.1);border-radius:5px;overflow:hidden;position:relative;">
            <div class="preview-bar" id="levelPreview" style="height:100%;width:{{ old('level', 75) }}%;background:linear-gradient(90deg, #12f7ff, #06c4cc);border-radius:5px;transition:width 0.3s ease;"></div>
          </div>
          <div style="margin-top:5px;display:flex;justify-content:space-between;">
            <span style="font-size:12px;color:#aaa;">0%</span>
            <span style="font-size:12px;color:#aaa;" id="levelValue">{{ old('level', 75) }}%</span>
            <span style="font-size:12px;color:#aaa;">100%</span>
          </div>
        </div>
      </div>
      
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const levelInput = document.querySelector('input[name="level"]');
          const levelPreview = document.getElementById('levelPreview');
          const levelValue = document.getElementById('levelValue');
          
          levelInput.addEventListener('input', function() {
            const value = this.value;
            levelPreview.style.width = value + '%';
            levelValue.textContent = value + '%';
          });
        });
      </script>
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Skill Logo</label>
        <input type="file" name="logo" accept="image/*" style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
      </div>
      
      @if ($errors->any())
      <div style="color:#ff6b6b;background:rgba(255,107,107,0.1);padding:10px;border-radius:5px;border-left:3px solid #ff6b6b">
        <strong>Error:</strong> {{ $errors->first() }}
      </div>
      @endif
      
      <div style="display:flex;gap:15px;margin-top:15px;justify-content:center">
        <button type="submit" style="padding:12px 30px;background:#12f7ff;color:#250821;border:none;border-radius:5px;font-weight:600;cursor:pointer;box-shadow:0 0 10px rgba(18, 247, 255, 0.5);transition:all 0.3s;min-width:140px">Save</button>
        <a href="{{ route('skills.index') }}" style="padding:12px 30px;background:transparent;color:#12f7ff;border:1px solid #12f7ff;border-radius:5px;font-weight:600;cursor:pointer;text-align:center;text-decoration:none;transition:all 0.3s;min-width:140px">Cancel</a>
      </div>
    </form>
    
    <style>
      .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
        border-color: #12f7ff;
        box-shadow: 0 0 0 2px rgba(18, 247, 255, 0.2);
        outline: none;
      }
      
      button[type="submit"]:hover {
        background: #00e6ff;
        transform: translateY(-2px);
        box-shadow: 0 0 15px rgba(18, 247, 255, 0.7);
      }
      
      a:hover {
        background: rgba(18, 247, 255, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 0 10px rgba(18, 247, 255, 0.3);
      }
    </style>
  </div>
</section>
@endsection
