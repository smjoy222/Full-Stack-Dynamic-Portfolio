@extends('index')
@push('style')
    <title>Edit Info</title>
@endpush
@section('main-Content')
<header>
  <div class="logo"><span>A</span>dmin</div>
  <ul class="navlist">
    <li><a href="{{ route('infos.index') }}">Back</a></li>
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
    <h2>Info</h2>
  </div>
  <div class="container" style="max-width:700px;margin:0 auto">
    <form method="POST" action="{{ route('infos.update', $info) }}" class="form" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      @method('PUT')
      <div class="input-box"><input name="designation" placeholder="Designation" value="{{ old('designation', $info->designation) }}"></div>
      <div class="input-box"><input name="portfolio" placeholder="Portfolio link or title" value="{{ old('portfolio', $info->portfolio) }}"></div>
      <div class="input-box"><input name="address" placeholder="Address" value="{{ old('address', $info->address) }}"></div>
      <div class="input-box"><textarea name="description" placeholder="Description" rows="3" style="width:100%;padding:10px;background:var(--second-bg-color);color:var(--text-color);border:1px solid var(--hover-color)">{{ old('description', $info->description) }}</textarea></div>
      @if ($errors->any())
      <div style="color:#ff6b6b">{{ $errors->first() }}</div>
      @endif
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button class="btn" type="submit" style="width:180px">Update</button>
        <a class="btn" href="{{ route('infos.index') }}" style="--bg-color:#1f1f1f;width:180px">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
