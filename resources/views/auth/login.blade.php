@extends('index')
@push('style')
    <title>Login</title>
@endpush
@section('main-Content')
<header>
    <div class="logo"><span>J</span>oy</div>
    <ul class="navlist">    
        <li><a href="/">Home</a></li>
        <li><a href="/edu">Education</a></li>
        <li><a href="/project">Project</a></li>
        <li><a href="/about">About</a></li>
    </ul>
    <div id="menu-icon" class="bi bi-list"></div>
</header>
<section class="contact" id="login" style="padding-top:100px;min-height:70vh;display:flex;flex-direction:column;align-items:center;justify-content:center">
  <div class="main-text" style="margin-bottom:40px">
    <span>WELCOME</span>
    <h2 style="color:#12f7ff;font-size:2.8rem;margin-top:5px">Sign in to Admin</h2>
  </div>
  <div class="container" style="max-width:400px;margin:0 auto">
    <form method="POST" action="{{ route('login.attempt') }}" class="form" style="display:flex;flex-direction:column;gap:20px;align-items:center">
      @csrf
      <div class="input-box" style="width:100%">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required style="width:100%;padding:12px;border:1px solid #333;background:rgba(255,255,255,0.08);border-radius:5px;color:#fff;font-size:16px">
      </div>
      <div class="input-box" style="width:100%">
        <input type="password" name="password" placeholder="Password" required style="width:100%;padding:12px;border:1px solid #333;background:rgba(255,255,255,0.08);border-radius:5px;color:#fff;font-size:16px">
      </div>
      @error('email')
      <div style="color:#ff6b6b;margin:8px 0;width:100%;text-align:center">{{ $message }}</div>
      @enderror
      <div style="width:100%;display:flex;justify-content:center;margin-top:10px">
        <button type="submit" style="width:200px;height:45px;background:#12f7ff;color:#250821;font-size:1rem;letter-spacing:1px;font-weight:600;border:2px solid #12f7ff;border-radius:5px;cursor:pointer;box-shadow:0 0 0.5rem #12f7ff;transition:0.3s">Login</button>
      </div>

      <style>
        button[type="submit"]:hover {
          background: #00e6ff;
          box-shadow: 0 0 1rem #12f7ff, 0 0 2rem rgba(18, 247, 255, 0.3);
          transform: translateY(-2px);
        }
      </style>
    </form>
  </div>
</section>
@endsection