{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FitForge Login</title>
    <link rel="icon" href="/images/icons/favicon.png" type="image/png">
    <link rel="shortcut icon" href="/images/icons/favicon.png" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/root.css" />
    <link rel="stylesheet" href="/css/app.css" />
    <style>
        /* Same style block as the register page */
        body {
            font-family: var(--font-primary);
            margin: 0;
            background-color: var(--color-bg);
            color: var(--color-dark);
        }

        .auth-container {
            display: flex;
            height: 100vh;
        }

        .form-section,
        .visual-section {
            width: 50%;
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-section {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow-lg);
        }

        .form-section h1 {
            color: var(--color-primary);
            font-size: var(--font-size-lg);
            font-weight: 700;
        }

        .form-section p {
            color: var(--color-muted);
            margin-bottom: var(--space-md);
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 300px;
        }


        .visual-section {
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            position: relative;
        }

        .visual-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .visual-content {
            position: relative;
            top: -10%;
            z-index: 2;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: var(--space-lg);
        }
        .visual-logo{
            position: absolute;
            top: 10px;
            right: 10px;
            height: 20px;
        }

        .visual-section h2 {
            font-size: 40px;
            color: var(--font-white);
            font-weight: 700;
        }

        .visual-section p:first-child {
            font-size: var(--font-size-lg);
        }
        .visual-footer {
            font-size: var(--font-size-xs);
            color: var(--font-white);
            margin-top: var(--space-md);
            position: absolute;
            bottom: 2px;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            margin-top: var(--space-lg);
        }
        .footer-section span {
            color: var(--color-muted);
            font-size: var(--font-size-xs);
            margin-bottom: var(--space-sm);

        }

        .footer {
            margin-top: var(--space-sm);
            font-size: var(--font-size-xs);
            color: var(--color-muted);
            display: flex;
            flex-direction: column;
        }

        .logo-left {
            height: 40px;
            margin-right: var(--space-sm);
        }

        @media screen and (max-width: 768px) {
            .auth-container {
                flex-direction: column;
            }

            .form-section,
            .visual-section {
                width: 100%;
                height: 50vh;
            }
        }

        .error {
            color: red;
            font-size: 0.875rem;
            margin-top: 4px;
        }
        .quote-icon {
            font-size: 5rem;
            color: var(--color-bg);
            margin-right: 8px;
        }

        /* Mobile phones (≤ 480px) */
@media screen and (max-width: 480px) {
    .auth-container {
        flex-direction: column;
    }

    .form-section,
    .visual-section {
        width: 100%;
        height: auto;
        padding: var(--space-md);
    }

    .form-section h1 {
        font-size: 1.5rem;
        text-align: center;
    }

    .form-section p {
        font-size: 0.875rem;
    }

    form {
        max-width: 100%;
    }

    .visual-content h2 {
        font-size: 1.5rem;
    }

    .visual-section::before {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .quote-icon {
        font-size: 2.5rem;
    }

    .footer-section {
        position: relative;
        margin-top: var(--space-md);
    }

    .logo-left {
        height: 30px;
    }

    .visual-logo {
        height: 16px;
    }
}

/* Tablets (481px–768px) */
@media screen and (min-width: 481px) and (max-width: 768px) {
    .auth-container {
        flex-direction: column;
    }

    .form-section,
    .visual-section {
        width: 100%;
        height: auto;
        padding: var(--space-lg);
    }

    form {
        max-width: 90%;
    }

    .form-section h1 {
        font-size: 1.8rem;
    }

    .visual-content h2 {
        font-size: 2rem;
    }

    .quote-icon {
        font-size: 3rem;
    }

    .footer-section {
        position: relative;
        margin-top: var(--space-md);
    }
}

/* Small desktops/laptops (769px–1024px) */
@media screen and (min-width: 769px) and (max-width: 1024px) {
    .form-section,
    .visual-section {
        padding: var(--space-md);
    }

    form {
        max-width: 80%;
    }

    .form-section h1 {
        font-size: 2rem;
    }

    .visual-content h2 {
        font-size: 2.5rem;
    }

    .quote-icon {
        font-size: 4rem;
    }
}

    </style>
</head>

<body>
    <!-- Login Page -->
    <div class="auth-container">
        <div class="form-section">
            <h1>Welcome Back</h1>
            <p>Log in and continue building the strongest version of you.</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus
                    autocomplete="username">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- Password -->
                <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- Buttons -->
                <button type="submit" class="btn btn-primary">Log In</button>
                <a class="btn btn-outline-primary" href="{{ route('register') }}">Sign Up</a>
            </form>

            <div class="footer-section">
                <img class="logo-left" src="/images/icons/color-logo.png" alt="">
                <span class="footer">© 2025 FitForge. Built with ❤ by Aman Mehta</span>
            </div>
        </div>

        <div class="visual-section" style="background-image: url('/images/backgrounds/login.png');">
        <img class="visual-logo" src="/images/icons/white-logo-f.png" alt="">
            <div class="visual-content">
            <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <h2>Discipline Builds Strength</h2>
                <p><em>Every rep, every step — one closer to the strongest version of you.</em></p>
            </div>
                <p class="visual-footer"><em>Built for the Bold. Built for You.</em></p>
        </div>
    </div>
</body>

</html>
