<!DOCTYPE html>
<html>
<head>
    <title>Malantar-Untua</title>
    <link href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon">
</head>
<body>
  <?= config('App')->baseURL ?>

  <header class="site-header">
  <div class="header-logo-box">
    <img src="./assets/images/my-avatar.png" alt="logo" class="header-logo">
  </div>
  </header>

  <div class="wrapper">
    <main>
    <aside class="sidebar" data-sidebar>
      <div class="sidebar-info">
        <figure class="avatar-box">
          <img src="./assets/images/my-avatar.png" alt="logo" width="80">
        </figure>
        <div class="info-content">
          <h1 class="name" title="name">Jondelicious Bistro</h1>
          <p class="title">Town's Best BBQ</p>
        </div>
      </div>
        <div class="separator"></div>
        <ul class="contacts-list">
          <li class="contact-item">
            <div class="icon-box">
              <i class="bi bi-envelope"></i>
            </div>
            <div class="contact-info">
              <p class="contact-title">Email</p>
              <a href="mailto:jondelicious-bistro@example.com" class="contact-link">jondelicious-bistro@example.com</a>
            </div>
          </li>
          <li class="contact-item">
            <div class="icon-box">
              <i class="bi bi-telephone"></i>
            </div>
            <div class="contact-info">
              <p class="contact-title">Phone</p>
              <a href="tel:+12133522795" class="contact-link">+1 (213) 352-2795</a>
            </div>
          </li>
          <li class="contact-item">
            <div class="icon-box">
              <i class="bi bi-geo-alt"></i>
            </div>
            <div class="contact-info">
              <p class="contact-title">Location</p>
              <address>Isulan, Sultan Kudarat, Philippines</address>
            </div>
          </li>
        </ul>
        <div class="separator"></div>
        <ul class="social-list">
          <li class="social-item">
            <a href="#" class="social-link">
              <i class="bi bi-facebook"></i>
            </a>
          </li>
          <li class="social-item">
            <a href="#" class="social-link">
              <i class="bi bi-twitter"></i>
            </a>
          </li>
          <li class="social-item">
            <a href="#" class="social-link">
              <i class="bi bi-instagram"></i>
            </a>
          </li>
        </ul>
    </aside>

=
    <div class="main-content has-scrollbar">
     <nav class="navbar">
        <ul class="navbar-list">
          <li class="navbar-item">
            <button class="navbar-link  active" data-nav-link>About</button>
          </li>
          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Menu</button>
          </li>
          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Login</button>
          </li>
        </ul>
      </nav>

<article class="login" data-page="login">
  <header>
    <h2 class="h2 article-title">Login</h2>
  </header>
<section class="login-section">
<form action="<?= base_url('login') ?>" method="post">

    <div class="form-group">
      <label for="username" class="form-label">Username</label>
      <input type="text" id="username" name="username" class="form-input" required>
    </div>

    <div class="form-group">
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" class="form-input" required>
    </div>

    <div class="form-group">
      <button type="submit" class="form-button">Log In</button>
    </div>
  </form>
    <p class="login-note">Sign-in to access Admin-Dashboard and Page Manager</p>
  </section>
</article>

<article class="menu" data-page="menu">
  <header>
    <h2 class="h2 article-title">Menu Manager</h2>
  </header>

  <section class="menu-section">
  </section>
</article>


      <article class="about  active" data-page="about">
        <header>
          <h2 class="h2 article-title">About Us</h2>
        </header>
        <section class="about-text">
          <p><span class="lead-words">Jondelicious Bistro</span> is a proudly local establishment rooted in the heart of Sultan Kudarat, serving up a flavorful fusion of traditional BBQ and bistro-style comfort food.</p>
          <p><span class="lead-words">Our Mission is simple</span>: to bring people together over hearty meals that celebrate fire-grilled craftsmanship and homegrown hospitality.</p>
          <p><span class="lead-words">Every Dish</span> we serve, from our signature ribs and skewers to our garlic rice bowls and seasonal sides, is prepared with care, using fresh ingredients and time-tested techniques that highlight the richness of Filipino flavors with a modern twist.</p>
          <p><span class="lead-words">We Believe</span> that great food should be both satisfying and soulful. That’s why our kitchen is built around the principles of slow cooking, bold seasoning, and generous portions.</p>
          <p>Whether you’re dining in with family, grabbing a quick bite with friends, or hosting a community gathering, Jondelicious Bistro offers a warm, welcoming space where every plate tells a story.</p>
          <p><span class="lead-words">More than just a place to eat</span>, we’re a destination for those who appreciate authenticity, consistency, and the joy of shared meals.</p>
          <p>From our friendly staff to our cozy ambiance, everything at Jondelicious is designed to make you feel at home, because here, every guest is family, and every meal is a celebration.</p>
        </section>


        <section class="service">
          <h3 class="h3 service-title">What We're Serving</h3>
          <ul class="service-list">
            <li class="service-item">
              <div class="service-icon-box">
                <img src="./assets/images/service1.png  
                " alt="design icon" width="50">
              </div>
              <div class="service-content-box">
                <h4 class="h4 service-item-title">Flame-grilled BBQ ribs and skewers</h4>
                <p class="service-item-text">
                  Our BBQ is slow cooked over real flame for that authentic smoky tase you won't forget.
                </p>
              </div>
            </li>
            <li class="service-item">
              <div class="service-icon-box">
                <img src="./assets/images/service2.png" alt="design icon" width="50">
              </div>
              <div class="service-content-box">
                <h4 class="h4 service-item-title">Bistro-style rice bowls and pasta</h4>
                <p class="service-item-text">
                  Comfort food favorites served hot, fresh, and full of flavor, from garlic rice bowls to creamy pasta dishes.
                </p>
              </div>
            </li>

            <li class="service-item">
              <div class="service-icon-box">
                <img src="./assets/images/service3.png" alt="design icon" width="50">
              </div>
              <div class="service-content-box">
                <h4 class="h4 service-item-title">Fresh sides and seasonal specials</h4>
                <p class="service-item-text">
                  Rotating dishes inspired by fresh local ingredients and festive flavors, crafted to match the season and surprise your taste buds.
                </p>
              </div>
            </li>
            <li class="service-item">
              <div class="service-icon-box">
                <img src="./assets/images/service4.png" alt="design icon" width="50">
              </div>
              <div class="service-content-box">
                <h4 class="h4 service-item-title">Cozy dine-in and takeaway options</h4>
                <p class="service-item-text">
                  Enjoy our dishes in a cozy bistro setting or bring the flavor home, satisfaction served your way.
                </p>
              </div>
            </li>
          </ul>
        </section>
 
        <section class="testimonials">
          <h3 class="h3 testimonials-title">Owners</h3>
          <ul class="testimonials-list has-scrollbar">
            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>
                <figure class="testimonials-avatar-box">
                  <img src="./assets/images/avatar-1.png" alt="Jenelene Malantar" width="120" data-testimonials-avatar>
                </figure>
                <h4 class="h4 testimonials-item-title" data-testimonials-title>Jenelene Malantar</h4>
                <div class="testimonials-text" data-testimonials-text>
                  <p>A 4th Year BS CpE student of SKSU - Isulan Campus
                  </p>
                </div>

              </div>
            </li>
            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>
                <figure class="testimonials-avatar-box">
                  <img src="./assets/images/avatar-2.png" alt="Joedon Untua" width="120" data-testimonials-avatar>
                </figure>
                <h4 class="h4 testimonials-item-title" data-testimonials-title>Joedon Untua</h4>
                <div class="testimonials-text" data-testimonials-text>
                  <p>A 4th Year BS CpE student of SKSU - Isulan Campus
                  </p>
                </div>
              </div>
            </li>
          </ul>
        </section>
          </section>
        </div>
      </article>
    </div>
  </main>
  </div>
<footer class="site-footer footer-ember">
<video autoplay muted loop playsinline>
  <source src="assets/images/ember.mp4" type="video/mp4">
</video>
</footer>
<canvas id="emberCanvas"></canvas>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
  <script src="<?= base_url('assets/js/cursor.js') ?>"></script>
  <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>