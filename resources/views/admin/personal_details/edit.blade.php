@extends('index')
@push('style')
    <title>Edit Personal Detail</title>
@endpush
@section('main-Content')
<header>
  <div class="logo"><span>A</span>dmin</div>
  <ul class="navlist">
    <li><a href="{{ route('personal_details.index') }}">Back</a></li>
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
    <h2>Personal Detail</h2>
  </div>
  <div class="container" style="max-width:700px;margin:0 auto">
    <form method="POST" action="{{ route('personal_details.update', $personalDetail) }}" class="form" style="display:flex;flex-direction:column;gap:16px">
      @csrf
      @method('PUT')
      <div class="input-box"><input name="department" placeholder="Department" value="{{ old('department', $personalDetail->department) }}"></div>
      <div class="input-box"><input name="address" placeholder="Address" value="{{ old('address', $personalDetail->address) }}"></div>
      <div class="input-box" style="display:flex;gap:12px">
        <input type="number" name="age" min="0" max="200" placeholder="Age" value="{{ old('age', $personalDetail->age) }}">
        <input type="date" name="dob" value="{{ old('dob', optional($personalDetail->dob)->format('Y-m-d')) }}">
        <input name="blood_group" placeholder="Blood Group" value="{{ old('blood_group', $personalDetail->blood_group) }}">
      </div>
      <div class="input-box"><input name="gender" placeholder="Gender" value="{{ old('gender', $personalDetail->gender) }}"></div>
      <div class="input-box"><textarea name="description" placeholder="Description" rows="3" style="width:100%;padding:10px;background:var(--second-bg-color);color:var(--text-color);border:1px solid var(--hover-color)">{{ old('description', $personalDetail->description) }}</textarea></div>
      @if ($errors->any())
      <div style="color:#ff6b6b">{{ $errors->first() }}</div>
      @endif
      <div class="btn-box" style="width:100%;justify-content:center;gap:16px">
        <button class="btn" type="submit" style="width:180px">Update</button>
        <a class="btn" href="{{ route('personal_details.index') }}" style="--bg-color:#1f1f1f;width:180px">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
