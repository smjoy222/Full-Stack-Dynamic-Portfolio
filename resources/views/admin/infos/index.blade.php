@extends('index')
@push('style')
    <title>Admin - Info</title>
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
        <button type="submit" class="btn" style="background:transparent;border:none;cursor:pointer">Logout</button>
      </form>
    </li>
  </ul>
  <div id="menu-icon" class="bi bi-list"></div>
</header>
<section class="services" id="infos" style="padding-top:40px;min-height:70vh">
  <div class="main-text">
    <span>Manage</span>
    <h2>Info</h2>
  </div>
  <div style="margin: 0 auto; max-width: 1000px; display:flex; justify-content: flex-end;">
    <a href="{{ route('infos.create') }}" class="btn">Add Info</a>
  </div>
  <div class="section-services" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;max-width:1000px;margin:20px auto">
    @foreach($items as $item)
    <div class="service-box">
      <i class="bi bi-info-circle service-icon"></i>
      <h3>{{ $item->designation }}</h3>
      <p>{{ \Illuminate\Support\Str::limit($item->description, 120) }}</p>
      <div style="display:flex;gap:10px">
        <a href="{{ route('infos.edit', $item) }}" class="read">Edit</a>
        <form action="{{ route('infos.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete?')">
          @csrf
          @method('DELETE')
          <button class="read" style="background:none;border:none;color:var(--hover-color);cursor:pointer">Delete</button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
  <div style="max-width:1000px;margin:0 auto;color:#bdbdbd">
    {{ $items->links() }}
  </div>
</section>
@endsection
