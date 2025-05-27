<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SM Joy Portfolio</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <header>
    <div class="logo">Joy.</div>
    <nav>
      <u href="">Home</u>
      <u href="">Work</u>
      <u href="">About</u>
      <u href="">Project</u>
    </nav>
    <button class="chat-btn">Let's Chat</button>
  </header>

  <main>
    <section class="intro">
      <div class="info">
        <h1>Hi! I am <span class="highlight">(UI/UX)</span><br>SM Joy</h1>
        <p>Design user interfaces<br> for over <strong>7 years</strong> as a <br> project designer</p>
        <div class="buttons">
          <button class="hire">Hire Me</button>
          <button class="projects">Project →</button>
        </div>
        <div class="stats">
          <p>84+ clients on work</p>
          <p>200+ projects done</p>
        </div>
        <p class="email"> Contact Mail: <a href="mailto:smjoy222@gmail.com">smjoy222@gmail.com</a></p>
      </div>
      <div class="image-box">
        <img src="{{ asset('assets/images/me.jpg') }}" alt="My Profile" class="profile-image">
      </div>
    </section>
  </main>
</body>
</html>
