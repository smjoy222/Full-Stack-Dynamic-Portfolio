@extends('index')
@push('style')
    <title>Edit Project</title>
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
    <span>Edit</span>
    <h2>Project</h2>
  </div>
  <div class="container" style="max-width:900px;margin:0 auto">
    <form method="POST" action="{{ route('projects.update', $project) }}" class="form" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      @method('PUT')
      <div class="input-box"><input name="name" placeholder="Project Name" value="{{ old('name', $project->name) }}" required></div>
      <div class="input-box"><textarea name="description" placeholder="Description" rows="4" style="width:100%;padding:10px;background:var(--second-bg-color);color:var(--text-color);border:1px solid var(--hover-color)">{{ old('description', $project->description) }}</textarea></div>
      <div class="input-box" style="display:flex;gap:12px;flex-wrap:wrap">
        <input name="github_url" placeholder="GitHub URL" value="{{ old('github_url', $project->github_url) }}">
        <input name="demo_url" placeholder="Demo URL" value="{{ old('demo_url', $project->demo_url) }}">
      </div>
      <div class="input-box" style="display:flex;gap:12px;flex-wrap:wrap">
        <input name="type" placeholder="Type" value="{{ old('type', $project->type) }}">
        <input name="reference" placeholder="Reference" value="{{ old('reference', $project->reference) }}">
        <input name="status" placeholder="Status" value="{{ old('status', $project->status) }}">
      </div>
      <div class="input-box"><input name="tools[]" placeholder="Tools (add multiple inputs)" value="{{ old('tools.0', $project->tools[0] ?? '') }}"></div>
      <div class="input-box"><input name="keywords[]" placeholder="Keywords (add multiple inputs)" value="{{ old('keywords.0', $project->keywords[0] ?? '') }}"></div>
      <div class="input-box"><input type="file" name="images[]" accept="image/*" multiple></div>
      @if ($errors->any())
      <div style="color:#ff6b6b">{{ $errors->first() }}</div>
      @endif
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button class="btn" type="submit" style="width:180px">Update</button>
        <a class="btn" href="{{ route('projects.index') }}" style="--bg-color:#1f1f1f;width:180px">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
