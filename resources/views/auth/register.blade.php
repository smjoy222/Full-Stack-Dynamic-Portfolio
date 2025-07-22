@extends('index')
@push('style')
    <title>Register</title>
@endpush
@section('main-Content')

<header>
    <div class="logo"><span>J</span>oy</div>
<ul class="navlist">    
        <li><a href="/">Home</a></li>
        <li><a href="/edu">Education</a></li>
        <li><a href="/project">Project</a></li>
        <li><a href="/about">About</a></li>
    </ul>
    <div id="menu-icon" class="bi bi-list"></div>
</header>

<!-- register section -->
<section id="register" class="register">
    <div class="register-content">
        <h1>Register</h1>
        
        <form method="POST" action="/register" class="register-form">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            
            <div class="btn-box">
                <button type="submit" class="btn">Register</button>
            </div>
        </form>
    </div>
</section>

@endsection