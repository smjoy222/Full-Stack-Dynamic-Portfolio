@extends('index')
@push('style')
    <title>Edit Achievement</title>
@endpush
@section('main-Content')
<header>
  <a href="{{ route('admin.dashboard') }}" style="text-decoration:none;"><div class="logo"><span style="color:#12f7ff">A</span><span style="color:white">dmin</span></div></a>
  <div style="display:flex;align-items:center;gap:20px;">
    <a href="{{ route('achievements.index') }}" id="back-btn" style="color:var(--text-color);font-weight:500;font-size:1rem;">Back</a>
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
    <span>EDIT</span>
    <h2 style="color:#12f7ff">Update Achievement</h2>
  </div>
  <div class="container" style="max-width:700px;margin:0 auto;background:rgba(41, 46, 51, 0.7);border-radius:10px;padding:30px;box-shadow:0 0 20px rgba(18, 247, 255, 0.2);border:1px solid rgba(18, 247, 255, 0.1)">
    <form method="POST" action="{{ route('achievements.update', $achievement) }}" class="form" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:20px">
      @csrf
      @method('PUT')
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Name</label>
        <input name="name" placeholder="Enter achievement name" value="{{ old('name', $achievement->name) }}" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
      </div>
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Organization</label>
        <input name="organization" placeholder="Enter organization name" value="{{ old('organization', $achievement->organization) }}" style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
      </div>
      
      <div style="display:flex;gap:20px;flex-wrap:wrap">
        <div class="form-group" style="flex:1;min-width:200px">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Type</label>
          <select name="type" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
            <option value="award" {{ old('type', $achievement->type) == 'award' ? 'selected' : '' }}>Award</option>
            <option value="certification" {{ old('type', $achievement->type) == 'certification' ? 'selected' : '' }}>Certification</option>
            <option value="recognition" {{ old('type', $achievement->type) == 'recognition' ? 'selected' : '' }}>Recognition</option>
          </select>
        </div>
        
        <div class="form-group" style="flex:1;min-width:200px">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Category</label>
          <select name="category" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
            <option value="academic" {{ old('category', $achievement->category) == 'academic' ? 'selected' : '' }}>Academic</option>
            <option value="professional" {{ old('category', $achievement->category) == 'professional' ? 'selected' : '' }}>Professional</option>
            <option value="other" {{ old('category', $achievement->category) == 'other' ? 'selected' : '' }}>Other</option>
          </select>
        </div>
      </div>
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Certification</label>
        <input name="certification" placeholder="Enter certification details" value="{{ old('certification', $achievement->certification) }}" style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
      </div>
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Date</label>
        <input type="date" name="date" value="{{ old('date', optional($achievement->date)->format('Y-m-d')) }}" style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
      </div>
      
      <div class="form-group">
        <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Images</label>
        <input type="file" name="images[]" accept="image/*" multiple style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
      </div>
      
      @if ($errors->any())
      <div style="color:#ff6b6b;background:rgba(255,107,107,0.1);padding:10px;border-radius:5px;border-left:3px solid #ff6b6b">
        <strong>Error:</strong> {{ $errors->first() }}
      </div>
      @endif
      
      <div style="display:flex;gap:15px;margin-top:15px;justify-content:center">
        <button type="submit" style="padding:12px 30px;background:#12f7ff;color:#250821;border:none;border-radius:5px;font-weight:600;cursor:pointer;box-shadow:0 0 10px rgba(18, 247, 255, 0.5);transition:all 0.3s;min-width:140px">Update</button>
        <a href="{{ route('achievements.index') }}" style="padding:12px 30px;background:transparent;color:#12f7ff;border:1px solid #12f7ff;border-radius:5px;font-weight:600;cursor:pointer;text-align:center;text-decoration:none;transition:all 0.3s;min-width:140px">Cancel</a>
      </div>
    </form>
    
    <style>
      .form-group input:focus, .form-group textarea:focus {
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
    </form>
  </div>
</section>
@endsection
