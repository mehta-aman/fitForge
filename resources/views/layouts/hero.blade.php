<section class="hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1><span>Train Smarter,</span><br>Not Harder</h1>
        <p>Your personalised fitness companion — track workouts, monitor progress, and stay motivated.</p>
        <div class="hero-buttons">
            <a href="#" class="btn btn-primary">Get Started</a>
            <a href="#" class="btn btn-outline-secondary">Explore Features</a>
        </div>
    </div>

    <style>
    
        /* Hero */
        .hero {
            position: relative;
            top: -65px;
            height: 67vh;
            background: url('{{ asset('images/backgrounds/bg-hero.jpg') }}') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .hero-content {
            position: relative;
            top: 10vh;
            z-index: 2;
            max-width: 700px;
            padding: 2rem;
        }

        .hero-content h1 {
            font-size: 4rem;
            color: white;
            font-weight: 900;
            line-height: 1;
        }

       .hero-content h1 span {
  background: var(--bg-gradient); /* Example: linear-gradient(to right, #00C9A7, #00dca0) */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  color: transparent;
}


        .hero-content p {
            margin: 1rem;
            font-size: 1.1rem;
            color: #ccc;
        }

        .hero-buttons .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

 /* Responsive Styles */

    @media screen and (max-width: 1024px) {
        .hero {
            height: 60vh;
        }

        .hero-content h1 {
            font-size: 3.2rem;
        }

        .hero-content p {
            font-size: 1rem;
        }
    }

    @media screen and (max-width: 768px) {
        .hero {
            height: 60vh;
        }

        .hero-content {
            padding: 1.5rem;
            top: 8vh;
        }

        .hero-content h1 {
            font-size: 2.5rem;
        }

        .hero-content p {
            font-size: 0.95rem;
        }

        .hero-buttons .btn {
            padding: 0.6rem 1.2rem;
            font-size: 0.95rem;
        }
    }

    @media screen and (max-width: 428px) {
        .hero {
            height: 55vh;
        }

        .hero-content {
            padding: 1rem;
            top: 7vh;
        }

        .hero-content h1 {
            font-size: 2rem;
        }

        .hero-content p {
            font-size: 0.9rem;
        }

        .hero-buttons .btn {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
    }

    @media screen and (max-width: 320px) {
        .hero {
            height: 55vh;
        }

        .hero-content {
            padding: 0.8rem;
            top: 6vh;
        }

        .hero-content h1 {
            font-size: 1.75rem;
        }

        .hero-content p {
            font-size: 0.85rem;
        }

        .hero-buttons .btn {
            padding: 0.4rem 0.9rem;
            font-size: 0.85rem;
        }
    }
       
    </style>
</section>