<nav class="navbar">
    <div class="logo">
        <a href="/">
        <img src="/images/icons/color-logo.png" alt="">
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Progress Tracker</a></li>
        <li><a href="#">Exercise Library</a></li>
        <li><a href="#">Community</a></li>
        <li><a href="#">Blog</a></li>
    </ul>
    <div class="auth-icons">
        <a href="{{route('login')}}"><i class="fa-solid fa-right-to-bracket"></i></a>
        <a href="{{route('register')}}"><i class="fa-solid fa-user-plus"></i></a>
    </div>

    <div class="hamburger" id="hamburger">
  <span></span>
  <span></span>
  <span></span>
</div>


 <style>
 /* Common Nav Styles */
.navbar {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--space-md) var(--space-lg);
  position: sticky;
  top: 0;
  z-index: 100;
  background-color: transparent;
  box-shadow: none;
  transform: translateY(-20px);
  opacity: 0;
  transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.4s ease, opacity 0.4s ease;
}

.navbar.visible {
  transform: translateY(0);
  opacity: 1;
}

.navbar.scrolled {
  background-color: #0e0e1b;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.logo,
.auth-icons {
  /* opacity: 0; */
  transform: translateY(-10px);
  transition: all 0.4s ease;
}

.navbar.visible .logo,
.navbar.visible .auth-icons {
  opacity: 1;
  transform: translateY(0);
}

.navbar .logo img {
  height: 30px;
}

/* Auth Icons */
.auth-icons {
  display: flex;
  gap: var(--space-md);
  color: var(--color-light);
}
.auth-icons a {
  display: inline-block;
  color: #ffffff;
  font-size: 1rem;
  margin: 0 0.5rem;
  border-radius: 100%;
  transition: transform 0.4s ease, color 0.3s ease;
}
.auth-icons a:hover {
  color: #00C9A7;
  transform: scale(1.3) rotate(-10deg);
}

/* Nav Links (Desktop) */
.nav-links {
  list-style: none;
  display: flex;
  gap: var(--space-md);
}
.nav-links li {
  position: relative;
}
.nav-links a {
  color: #ffffff;
  text-decoration: none;
  position: relative;
  padding-bottom: 2px;
  transition: color 0.3s ease;
}
.nav-links a::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 50%;
  height: 2px;
  background-color: var(--color-secondary);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s ease-in-out;
}
.nav-links a:hover {
  color: var(--color-secondary);
}
.nav-links a:hover::after {
  transform: scaleX(1);
}

/* Hamburger */
.hamburger {
  display: none;
  flex-direction: column;
  cursor: pointer;
  gap: 5px;
  z-index: 101;
}
.hamburger span {
  width: 20px;
  height: 3px;
  background-color: white;
  transition: all 0.3s ease;
  border-radius: 2px;
}
.hamburger.active span:nth-child(1) {
  transform: translateY(8px) rotate(45deg);
}
.hamburger.active span:nth-child(2) {
  opacity: 0;
}
.hamburger.active span:nth-child(3) {
  transform: translateY(-8px) rotate(-45deg);
}

/* -------- Mobile Styles -------- */
@media (max-width: 768px) {
  .hamburger {
    display: flex;
  }

  .nav-links {
    flex-direction: column;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: var(--color-dark);
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.4s ease;
    z-index: 99;
    display: flex; /* maintain flex structure */
    padding: var(--space-md);
  }

  .navbar.mobile-active .nav-links {
    max-height: 500px;
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .nav-links li {
    margin-bottom: var(--space-sm);
    opacity: 0;
    transform: translateX(-20px);
    transition: all 0.3s ease;
  }

  .navbar.mobile-active .nav-links li {
    opacity: 1;
    transform: translateX(0);
  }

  /* Optional: Add stagger animation */
  .navbar.mobile-active .nav-links li:nth-child(1) { transition-delay: 0.05s; }
  .navbar.mobile-active .nav-links li:nth-child(2) { transition-delay: 0.1s; }
  .navbar.mobile-active .nav-links li:nth-child(3) { transition-delay: 0.15s; }
  .navbar.mobile-active .nav-links li:nth-child(4) { transition-delay: 0.2s; }
  .navbar.mobile-active .nav-links li:nth-child(5) { transition-delay: 0.25s; }
  .navbar.mobile-active .nav-links li:nth-child(6) { transition-delay: 0.3s; }
}
</style>

</nav>
<!-- Your navbar code above -->

<!-- Place JS here -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('.navbar');
    const hamburger = document.getElementById('hamburger');

    // Make navbar visible on load
    navbar.classList.add('visible');

    if (window.scrollY > 20) {
      navbar.classList.add('scrolled');
    }

    // Scroll effect
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    // Hamburger click
    hamburger.addEventListener('click', () => {
      navbar.classList.toggle('mobile-active');
      hamburger.classList.toggle('active');
    });

    // Close on outside click
    document.addEventListener('click', function (e) {
      if (!navbar.contains(e.target) && !hamburger.contains(e.target)) {
        navbar.classList.remove('mobile-active');
        hamburger.classList.remove('active');
      }
    });
  });
</script>
