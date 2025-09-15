@extends('index')
@push('style')
    <title>Admin - Profile</title>
@endpush
@section('main-Content')
<header>
    <div class="logo"><span>A</span>dmin</div>
    <ul class="navlist">
      <li><a href="/admin">Dashboard</a></li>
      <li><a href="{{ route('admin.profile') }}">Profile</a></li>
      <li>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
          @csrf
          <button type="submit" class="read" style="background:none;border:1px solid var(--hover-color);padding:8px 16px;color:var(--hover-color);border-radius:8px;cursor:pointer">Logout</button>
        </form>
      </li>
    </ul>
    <div id="menu-icon" class="bi bi-list"></div>
</header>
<section class="contact" style="padding-top:40px;min-height:70vh">
  <div class="main-text">
    <span>Account</span>
    <h2>Profile</h2>
  </div>
  <div class="container" style="max-width:1000px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:24px">
    <div>
      <h3 style="margin-bottom:12px">Update Profile</h3>
      <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="form" style="display:flex;flex-direction:column;gap:16px">
        @csrf
        @method('PUT')
        <div class="input-box"><input name="name" placeholder="Name" value="{{ old('name', $user->name) }}" required></div>
        <div class="input-box"><input name="email" type="email" placeholder="Email" value="{{ old('email', $user->email) }}" required></div>
        <div class="input-box"><input name="phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}"></div>
        <div class="input-box"><input type="file" name="avatar" accept="image/*"></div>
        @if ($errors->any())
          <div style="color:#ff6b6b">{{ $errors->first() }}</div>
        @endif
        @if (session('success'))
          <div style="color:#12f7ff">{{ session('success') }}</div>
        @endif
        <div class="btn-box" style="width:100%;justify-content:flex-start;gap:16px">
          <button class="btn" type="submit" style="width:180px">Save</button>
        </div>
      </form>
    </div>
    <div>
      <h3 style="margin-bottom:12px">Change Password</h3>
      <form method="POST" action="{{ route('admin.profile.password') }}" class="form" style="display:flex;flex-direction:column;gap:16px">
        @csrf
        @method('PUT')
        <div class="input-box"><input name="current_password" type="password" placeholder="Current Password" required></div>
        <div class="input-box"><input name="password" type="password" placeholder="New Password (min 8)" required></div>
        <div class="input-box"><input name="password_confirmation" type="password" placeholder="Confirm New Password" required></div>
        @error('current_password')
          <div style="color:#ff6b6b">{{ $message }}</div>
        @enderror
        @if (session('success'))
          <div style="color:#12f7ff">{{ session('success') }}</div>
        @endif
        <div class="btn-box" style="width:100%;justify-content:flex-start;gap:16px">
          <button class="btn" type="submit" style="width:220px">Update Password</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
