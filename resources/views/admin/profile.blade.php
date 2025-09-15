@extends('index')
@push('style')
    <title>Admin - Profile</title>
@endpush
@section('main-Content')
<header>
    <a href="{{ route('admin.dashboard') }}" style="text-decoration:none;"><div class="logo"><span style="color:#12f7ff">A</span><span style="color:white">dmin</span></div></a>
    <div style="display:flex;align-items:center;gap:20px;">
      <a href="/admin" id="dashboard-btn" style="color:var(--text-color);font-weight:500;font-size:1rem;">Dashboard</a>
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit" id="logout-btn" style="background:none;border:none;cursor:pointer;color:var(--text-color);font-weight:500;font-size:1rem;">Logout</button>
      </form>
    </div>
    <div id="menu-icon" class="bi bi-list"></div>
    
    <style>
      #dashboard-btn, #logout-btn {
        transition: all 0.3s ease;
      }
      
      #dashboard-btn:hover, #logout-btn:hover {
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
    <span>ACCOUNT</span>
    <h2 style="color:#12f7ff">Profile</h2>
  </div>
  
  <div class="container" style="max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:30px;padding:0 20px">
    <!-- Update Profile Form -->
    <div style="background:rgba(41, 46, 51, 0.7);border-radius:10px;padding:30px;box-shadow:0 0 20px rgba(18, 247, 255, 0.2);border:1px solid rgba(18, 247, 255, 0.1)">
      <h3 style="color:#12f7ff;margin-bottom:25px;font-size:1.3rem;border-bottom:1px solid rgba(18, 247, 255, 0.2);padding-bottom:10px">Update Profile</h3>
      
      <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="form" style="display:flex;flex-direction:column;gap:20px">
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Name <span style="color:#ff6b6b">*</span></label>
          <input name="name" placeholder="Your name" value="{{ old('name', $user->name) }}" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
        </div>
        
        <div class="form-group">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Email <span style="color:#ff6b6b">*</span></label>
          <input name="email" type="email" placeholder="your.email@example.com" value="{{ old('email', $user->email) }}" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
        </div>
        
        <div class="form-group">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Phone Number</label>
          <input name="phone" placeholder="Your phone number" value="{{ old('phone', $user->phone) }}" style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
        </div>
        
        <div class="form-group">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Profile Picture</label>
          <div style="padding:15px;border:1px dashed rgba(18, 247, 255, 0.3);border-radius:5px;background:rgba(255,255,255,0.02)">
            <input type="file" name="avatar" accept="image/*" style="width:100%;color:#fff">
          </div>
        </div>
        
        @if ($errors->any())
        <div style="color:#ff6b6b;background:rgba(255,107,107,0.1);padding:10px;border-radius:5px;border-left:3px solid #ff6b6b">
          <strong>Error:</strong> {{ $errors->first() }}
        </div>
        @endif
        
        @if (session('success'))
        <div style="color:#12f7ff;background:rgba(18, 247, 255, 0.1);padding:10px;border-radius:5px;border-left:3px solid #12f7ff">
          <strong>Success:</strong> {{ session('success') }}
        </div>
        @endif
        
        <div style="margin-top:10px">
          <button type="submit" style="padding:12px 30px;background:#12f7ff;color:#250821;border:none;border-radius:5px;font-weight:600;cursor:pointer;box-shadow:0 0 10px rgba(18, 247, 255, 0.5);transition:all 0.3s;min-width:140px">Save Profile</button>
        </div>
      </form>
    </div>
    
    <!-- Change Password Form -->
    <div style="background:rgba(41, 46, 51, 0.7);border-radius:10px;padding:30px;box-shadow:0 0 20px rgba(18, 247, 255, 0.2);border:1px solid rgba(18, 247, 255, 0.1)">
      <h3 style="color:#12f7ff;margin-bottom:25px;font-size:1.3rem;border-bottom:1px solid rgba(18, 247, 255, 0.2);padding-bottom:10px">Change Password</h3>
      
      <form method="POST" action="{{ route('admin.profile.password') }}" class="form" style="display:flex;flex-direction:column;gap:20px">
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Current Password <span style="color:#ff6b6b">*</span></label>
          <input name="current_password" type="password" placeholder="Enter your current password" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
        </div>
        
        <div class="form-group">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">New Password <span style="color:#ff6b6b">*</span></label>
          <input name="password" type="password" placeholder="Minimum 8 characters" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
        </div>
        
        <div class="form-group">
          <label style="color:#12f7ff;font-size:14px;margin-bottom:5px;display:block">Confirm New Password <span style="color:#ff6b6b">*</span></label>
          <input name="password_confirmation" type="password" placeholder="Confirm your new password" required style="width:100%;padding:12px;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(18, 247, 255, 0.3);border-radius:5px;font-size:15px;transition:all 0.3s">
        </div>
        
        @error('current_password')
        <div style="color:#ff6b6b;background:rgba(255,107,107,0.1);padding:10px;border-radius:5px;border-left:3px solid #ff6b6b">
          <strong>Error:</strong> {{ $message }}
        </div>
        @enderror
        
        <div style="margin-top:10px">
          <button type="submit" style="padding:12px 30px;background:#12f7ff;color:#250821;border:none;border-radius:5px;font-weight:600;cursor:pointer;box-shadow:0 0 10px rgba(18, 247, 255, 0.5);transition:all 0.3s;min-width:140px">Update Password</button>
        </div>
      </form>
    </div>
  </div>
  
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
    
    @media (max-width: 992px) {
      .container {
        grid-template-columns: 1fr;
      }
    }
  </style>
    </div>
  </div>
</section>
@endsection
