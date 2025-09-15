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
<section class="contact" id="login" style="padding-top:40px;min-height:70vh">
  <div class="main-text">
    <span>Welcome</span>
    <h2>Sign in to Admin</h2>
  </div>
  <div class="container" style="max-width:520px;margin:0 auto">
    <form method="POST" action="{{ route('login.attempt') }}" class="form" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      <div class="input-box">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      @error('email')
      <div style="color:#ff6b6b;margin:8px 0">{{ $message }}</div>
      @enderror
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button type="submit" class="btn" style="width:180px">Login</button>
        <a href="/register" class="btn" style="--bg-color:#1f1f1f;width:180px">Register</a>
      </div>
    </form>
  </div>
</section>
@endsection