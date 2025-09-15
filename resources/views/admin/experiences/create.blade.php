@extends('index')
@push('style')
    <title>Create Experience</title>
@endpush
@section('main-Content')
<header>
  <div class="logo"><span>A</span>dmin</div>
  <ul class="navlist">
    <li><a href="{{ route('experiences.index') }}">Back</a></li>
    <li><a href="{{ route('admin.profile') }}">Profile</a></li>
    
    <li>
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit" class="btn" style="background:transparent;border:none;cursor:pointer">Logout</button>
      </form>
    </li>
    <li>
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit" class="btn" style="background:transparent;border:none;cursor:pointer">Logout</button>
      </form>
    </li>
  </ul>
  <div id="menu-icon" class="bi bi-list"></div>
</header>
<section class="contact" style="padding-top:40px;min-height:70vh">
  <div class="main-text">
    <span>New</span>
    <h2>Add Experience</h2>
  </div>
  <div class="container" style="max-width:700px;margin:0 auto">
    <form method="POST" action="{{ route('experiences.store') }}" class="form" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      <div class="input-box"><input name="designation" placeholder="Designation" value="{{ old('designation') }}" required></div>
      <div class="input-box"><input name="organization" placeholder="Organization" value="{{ old('organization') }}" required></div>
      <div class="input-box"><input name="type" placeholder="Type (Full-time, Part-time, Intern)" value="{{ old('type') }}"></div>
      <div class="input-box" style="display:flex;gap:12px">
        <input type="date" name="from_date" value="{{ old('from_date') }}" required>
        <input type="date" name="to_date" value="{{ old('to_date') }}">
      </div>
      @if ($errors->any())
      <div style="color:#ff6b6b">{{ $errors->first() }}</div>
      @endif
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button class="btn" type="submit" style="width:180px">Save</button>
        <a class="btn" href="{{ route('experiences.index') }}" style="--bg-color:#1f1f1f;width:180px">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
