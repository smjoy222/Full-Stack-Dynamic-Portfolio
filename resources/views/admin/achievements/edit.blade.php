@extends('index')
@push('style')
    <title>Edit Achievement</title>
@endpush
@section('main-Content')
<header>
  <div class="logo"><span>A</span>dmin</div>
  <ul class="navlist">
    <li><a href="{{ route('achievements.index') }}">Back</a></li>
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
    <h2>Achievement</h2>
  </div>
  <div class="container" style="max-width:700px;margin:0 auto">
    <form method="POST" action="{{ route('achievements.update', $achievement) }}" class="form" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      @method('PUT')
      <div class="input-box"><input name="name" placeholder="Name" value="{{ old('name', $achievement->name) }}" required></div>
      <div class="input-box"><input name="organization" placeholder="Organization" value="{{ old('organization', $achievement->organization) }}"></div>
      <div class="input-box"><input name="type" placeholder="Type" value="{{ old('type', $achievement->type) }}"></div>
      <div class="input-box"><input name="certification" placeholder="Certification" value="{{ old('certification', $achievement->certification) }}"></div>
      <div class="input-box"><input type="date" name="date" value="{{ old('date', optional($achievement->date)->format('Y-m-d')) }}"></div>
      <div class="input-box"><input name="category" placeholder="Category" value="{{ old('category', $achievement->category) }}"></div>
      <div class="input-box"><input type="file" name="images[]" accept="image/*" multiple></div>
      @if ($errors->any())
      <div style="color:#ff6b6b">{{ $errors->first() }}</div>
      @endif
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button class="btn" type="submit" style="width:180px">Update</button>
        <a class="btn" href="{{ route('achievements.index') }}" style="--bg-color:#1f1f1f;width:180px">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
