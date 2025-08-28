{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FitForge Auth Pages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/root.css" />
    <link rel="stylesheet" href="/css/app.css" />

    <style>
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
            background-color: rgba(0, 0, 0, 0.3);
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
            font-size:40px;
            font-weight: 700;
            color: var(--font-white);
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
            /* roughly equivalent to 14px or use 12px for smaller */
            margin-top: 4px;
        }
        .quote-icon {
            font-size: 5rem;
            color: var(--color-bg);
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <!-- Register Page -->
    <div class="auth-container">
        <div class="form-section">
            <h1>Forge Your Beginning</h1>
            <p>Every rep, every day — it starts right here.</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus
                    autocomplete="name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- Email -->
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                    autocomplete="username">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- Password -->
                <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- Confirm Password -->
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                    autocomplete="new-password">
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- Buttons -->
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
            </form>

            <div class="footer-section">
                <img class="logo-left" src="/images/icons/color-logo.png" alt="">
                <p class="footer">© 2025 FitForge. Built with ❤ by Aman Mehta</p>
            </div>
        </div>
        <div class="visual-section" style="background-image: url('/images/backgrounds/register.png');">
        <img class="visual-logo" src="/images/icons/white-logo-f.png" alt="">
            <div class="visual-content">
            <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <h2>Every Journey Starts With One Rep</h2>
                <p><em>Sign up and start building the strongest version of you.</em></p>
            </div>
            <p class="visual-footer"><em>Built for the Bold. Built for You.</em></p>
        </div>
    </div>

    <!-- Repeat same for login with altered text and fewer inputs -->
</body>

</html>