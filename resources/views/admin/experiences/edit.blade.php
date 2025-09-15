@extends('index')
@push('style')
    <title>Edit Experience</title>
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
    <span>Edit</span>
    <h2>Experience</h2>
  </div>
  <div class="container" style="max-width:700px;margin:0 auto">
    <form method="POST" action="{{ route('experiences.update', $experience) }}" class="form" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      @method('PUT')
      <div class="input-box"><input name="designation" placeholder="Designation" value="{{ old('designation', $experience->designation) }}" required></div>
      <div class="input-box"><input name="organization" placeholder="Organization" value="{{ old('organization', $experience->organization) }}" required></div>
      <div class="input-box"><input name="type" placeholder="Type" value="{{ old('type', $experience->type) }}"></div>
      <div class="input-box" style="display:flex;gap:12px">
        <input type="date" name="from_date" value="{{ old('from_date', optional($experience->from_date)->format('Y-m-d')) }}" required>
        <input type="date" name="to_date" value="{{ old('to_date', optional($experience->to_date)->format('Y-m-d')) }}">
      </div>
      @if ($errors->any())
      <div style="color:#ff6b6b">{{ $errors->first() }}</div>
      @endif
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button class="btn" type="submit" style="width:180px">Update</button>
        <a class="btn" href="{{ route('experiences.index') }}" style="--bg-color:#1f1f1f;width:180px">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
