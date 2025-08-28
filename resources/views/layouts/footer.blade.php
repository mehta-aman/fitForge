<div class="fitforge-signup-card-container">
    <div class="fitforge-signup-card text-center">
        <h2 class="fw-bold mb-2">Ready to Crush Your Fitness Goals</h2>
        <p class="mb-4">Join 5,000+ users getting stronger with FitForge.</p>
        <a href="{{ route('register') }}" class="btn btn-primary px-4 py-2">Sign up Now</a>
    </div>
</div>
<footer class="footer">
    <!-- Signup Card Above Footer -->
   
    <div class="footer-top">
        <p class="tagline">FitForge is your all-in-one fitness companion to stay consistent and crush your goals.</p>
        <div class="logo">
            <a href=""> <img src="/images/icons/white-logo-f.png" alt="fitForge"></a>
        </div>
        <div class="newsletter">
            <h4>Subscribe to Newsletter</h4>
            <form>
                <input type="email" placeholder="Enter email address" />
                <button class="btn btn-secondary" type="submit">Join</button>
            </form>
        </div>
    </div>

    <div class="footer-middle">
        <div class="social-icons">
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        </div>
        <ul class="footer-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Progress Tracker</a></li>
            <li><a href="#">Exercise Library</a></li>
            <li><a href="#">Community</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 FitForge. Built by <a href="#">Aman Mehta</a></p>
    </div>

    <style>
        .fitforge-signup-card-container {
            position: relative;
            z-index: 100;
            display: flex;
            justify-content: center;
            top: 150px;
            margin-bottom: 0;
        }
        .fitforge-signup-card {
            background: #10c9b7 !important;
            border-radius: 2rem;
            box-shadow: 0 8px 32px 0 rgba(16, 201, 183, 0.35), 0 2px 16px 0 rgba(0,0,0,0.10);
            padding: 2rem 1rem;
            max-width: 700px;
            width: 100%;
            color: #1a1a1a;
            pointer-events: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
        }
        .fitforge-signup-card h2 {
            font-weight: 700;
            color: #1a1a1a;
            font-size: 1.5rem;
        }
        .fitforge-signup-card p {
            color: #1a1a1a;
            font-size: 1rem;
        }
       
        .footer {
            background-color: var(--color-primary);
            color: white;
            padding: 10rem 1rem 1rem; /* Increased top padding for card */
        }
        .footer-top {
            width: 90%;
            margin: 0 auto;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 2rem;
            border-bottom: 1px solid #ccc2cc;
        }

        .footer .tagline {
            flex: 1;
            max-width: 250px;
            font-size: 0.9rem;
            color: #f0f0f0;
        }

        .footer .logo h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .footer .logo img {
            height: 80px;
            width: auto;
            opacity: 1;
            z-index: 10;
        }


        .footer .fit {
            font-weight: 400;
        }

        .footer .forge {
            font-weight: 700;
        }

        .footer .icon {
            font-size: 1.5rem;
            margin-left: 0.5rem;
        }

        .footer .newsletter {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 300px;
            margin-top: 1rem;
        }

        .footer .newsletter h4 {
            margin-bottom: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            color: var(--font-white);
        }

        .footer .newsletter form {
            display: flex;
            gap: 0.5rem;
        }

        .footer .newsletter input {
            width: 100%;
            padding: var(--space-sm);
            margin: var(--space-sm);
            font-size: var(--font-size-sm);
            color: var(--color-dark);
            background: var(--color-bg);
            border: white;
            border-bottom: 2px solid var(--color-secondary);
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            outline: none;
        }


        .footer-middle {
            margin-top: 2rem;
            text-align: center;
        }

        .footer .social-icons a {
            margin: 0 0.5rem;
            font-size: 1.2rem;
            color: white;
            text-decoration: none;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin: 1rem;
            list-style: none;

        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
            font-size: var(--font-size-sm);
            position: relative;
            padding-bottom: 2px;
            transition: color 0.3s ease;
            overflow: hidden;
        }

        .footer-links a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50%;
            height: 2px;
            background-color: #00dca0;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease-in-out;
        }

        .footer-links a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .footer-links a:not(:hover)::after {
            transform-origin: right;
        }


        .footer-bottom p {
            text-align: center;
            font-size: var(--font-size-sm) !important;
            color: #ccc;
        }

        .footer-bottom a {
            color: #00dca0;
            text-decoration: none;
            position: relative;
            padding-bottom: 2px;
            transition: color 0.3s ease;
        }

        .footer-bottom a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0%;
            height: 2px;
            background-color: #00dca0;
            transition: width 0.4s ease-in-out;
            transform-origin: left;
        }

        .footer-bottom a:hover {
            color: #00f5b1;
        }

        .footer-bottom a:hover::after {
            width: 50%;
        }

        .social-icons a {
            display: inline-block;
            color: #00dca0;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1), color 0.3s ease;
        }

        .social-icons a:hover {
            transform: scale(1.5) rotate(-15deg);
            color: #ffffff;
            /* optional: change on hover */
        }


        /* Tablet - 1024px and below */
        @media (max-width: 1024px) {
            .logo img {
                height: 70px;
            }

            .footer-top {
                align-items: center;
                text-align: center;
                justify-content: space-between;
            }

            .footer .newsletter {
                width: 100%;
                align-items: center;
            }

            .footer .logo h1 {
                font-size: 2rem;
            }
        }

        /* Medium Devices - 768px and below */
        @media (max-width: 768px) {
            .footer-top {
                flex-direction: column;
            }

            .footer .tagline {
                text-align: center;
                margin-bottom: 1rem;
            }

            .footer .newsletter form {
                flex-direction: column;
                gap: 0.75rem;
            }

            .footer-links {
                flex-direction: column;
                align-items: center;
            }

            .footer .social-icons {
                margin-top: 1rem;
                text-align: center;
            }

            .fitforge-signup-card {
                padding: 1.5rem 1rem;
            }
            .fitforge-signup-card-container {
                margin-top: -40px;
            }
            .fitforge-signup-card h2 {
                font-size: 1.3rem;
            }
            .footer {
                padding-top: 3.5rem;
            }
        }

        /* Mobile - 428px and below */
        @media (max-width: 428px) {
            .footer .logo h1 {
                font-size: 1.8rem;
            }

            .footer .newsletter h4 {
                font-size: 0.9rem;
            }

            .footer-links a {
                font-size: 0.85rem;
            }
        }

        /* Very Small Devices - 320px and below */
        @media (max-width: 320px) {
            .footer .logo h1 {
                font-size: 1.5rem;
            }

            .footer .tagline {
                font-size: 0.75rem;
            }

            .footer .newsletter input {
                font-size: 0.75rem;
            }

            .footer-bottom p {
                font-size: 0.7rem;
            }
        }
    </style>

</footer>