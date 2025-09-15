@extends('index')
@push('style')
    <title>Register</title>
@endpush
@section('main-Content')
<section class="contact" id="register" style="padding-top:140px;min-height:70vh">
  <div class="main-text">
    <span>Join</span>
    <h2>Create Account</h2>
  </div>
  <div class="container">
    <form method="POST" action="/register" class="form">
      @csrf
      <div class="input-box">
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
      </div>
      <div class="input-box">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="input-box">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
      </div>
      <div class="btn-box">
        <button type="submit" class="btn">Register</button>
        <a href="/login" class="btn" style="--bg-color:#1f1f1f">Login</a>
      </div>
    </form>
  </div>
</section>
@endsection