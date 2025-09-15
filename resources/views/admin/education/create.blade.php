@extends('index')
@push('style')
    <title>Create Education</title>
@endpush
@section('main-Content')
<header>
  <div class="logo"><span>A</span>dmin</div>
  <ul class="navlist">
    <li><a href="{{ route('education.index') }}">Back</a></li>
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
    <h2>Add Education</h2>
  </div>
  <div class="container" style="max-width:700px;margin:0 auto">
    <form method="POST" action="{{ route('education.store') }}" class="form" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      <div class="input-box"><input name="type" placeholder="Type (e.g., BSc)" value="{{ old('type') }}" required></div>
      <div class="input-box"><input name="name" placeholder="Program Name" value="{{ old('name') }}" required></div>
      <div class="input-box"><input name="institute" placeholder="Institute" value="{{ old('institute') }}" required></div>
      <div class="input-box" style="display:flex;gap:12px">
        <input name="enrolled_year" placeholder="Start Year" value="{{ old('enrolled_year') }}">
        <input name="passing_year" placeholder="End Year" value="{{ old('passing_year') }}">
      </div>
      <div class="input-box"><input name="grade" placeholder="Grade (optional)" value="{{ old('grade') }}"></div>
      @if ($errors->any())
      <div style="color:#ff6b6b">{{ $errors->first() }}</div>
      @endif
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button class="btn" type="submit" style="width:180px">Save</button>
        <a class="btn" href="{{ route('education.index') }}" style="--bg-color:#1f1f1f;width:180px">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
