@extends('index')
@push('style')
    <title>Admin - Projects</title>
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
<section class="services" id="projects" style="padding-top:40px;min-height:70vh">
  <div class="main-text">
    <span>Manage</span>
    <h2>Projects</h2>
  </div>
  <div style="margin: 0 auto; max-width: 1100px; display:flex; justify-content: flex-end;">
    <a href="{{ route('projects.create') }}" class="btn">Add Project</a>
  </div>
  <div class="section-services" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;max-width:1100px;margin:20px auto">
    @foreach($items as $item)
    <div class="service-box">
      <i class="bi bi-kanban service-icon"></i>
      <h3>{{ $item->name }}</h3>
      <p>{{ \Illuminate\Support\Str::limit($item->description, 120) }}</p>
      <div style="display:flex;gap:10px;flex-wrap:wrap">
        <a href="{{ route('projects.edit', $item) }}" class="read">Edit</a>
        <form action="{{ route('projects.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete?')">
          @csrf
          @method('DELETE')
          <button class="read" style="background:none;border:none;color:var(--hover-color);cursor:pointer">Delete</button>
        </form>
        @if($item->github_url)
          <a href="{{ $item->github_url }}" class="read" target="_blank">GitHub</a>
        @endif
        @if($item->demo_url)
          <a href="{{ $item->demo_url }}" class="read" target="_blank">Demo</a>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div style="max-width:1100px;margin:0 auto;color:#bdbdbd">
    {{ $items->links() }}
  </div>
</section>
@endsection
