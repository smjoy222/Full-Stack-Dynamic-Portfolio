@extends('index')
@push('style')
    <title>Create Project</title>
@endpush
@section('main-Content')
<header>
  <div class="logo"><span>A</span>dmin</div>
  <ul class="navlist">
    <li><a href="{{ route('projects.index') }}">Back</a></li>
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
    <h2>Add Project</h2>
  </div>
  <div class="container" style="max-width:900px;margin:0 auto">
    <form method="POST" action="{{ route('projects.store') }}" class="form" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      <div class="input-box"><input name="name" placeholder="Project Name" value="{{ old('name') }}" required></div>
      <div class="input-box"><textarea name="description" placeholder="Description" rows="4" style="width:100%;padding:10px;background:var(--second-bg-color);color:var(--text-color);border:1px solid var(--hover-color)">{{ old('description') }}</textarea></div>
      <div class="input-box" style="display:flex;gap:12px;flex-wrap:wrap">
        <input name="github_url" placeholder="GitHub URL" value="{{ old('github_url') }}">
        <input name="demo_url" placeholder="Demo URL" value="{{ old('demo_url') }}">
      </div>
      <div class="input-box" style="display:flex;gap:12px;flex-wrap:wrap">
        <input name="type" placeholder="Type" value="{{ old('type') }}">
        <input name="reference" placeholder="Reference" value="{{ old('reference') }}">
        <input name="status" placeholder="Status" value="{{ old('status') }}">
      </div>
      <div class="input-box"><input name="tools[]" placeholder="Tools (add multiple inputs)" value="{{ old('tools.0') }}"></div>
      <div class="input-box"><input name="keywords[]" placeholder="Keywords (add multiple inputs)" value="{{ old('keywords.0') }}"></div>
      <div class="input-box"><input type="file" name="images[]" accept="image/*" multiple></div>
      @if ($errors->any())
      <div style="color:#ff6b6b">{{ $errors->first() }}</div>
      @endif
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button class="btn" type="submit" style="width:180px">Save</button>
        <a class="btn" href="{{ route('projects.index') }}" style="--bg-color:#1f1f1f;width:180px">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
