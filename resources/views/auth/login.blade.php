@extends('index')
@push('style')
    <title>Login</title>
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

<!-- login section -->
<section id="login" class="login">
    <div class="login-content">
        <h1>Login</h1>
        
        <form method="POST" action="/login" class="login-form">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            
            <div class="btn-box">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</section>

@endsection