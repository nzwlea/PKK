<x-guest-layout>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        body {
            background:
                radial-gradient(circle at 15% 20%, rgba(245, 183, 0, .15), transparent 25%),
                radial-gradient(circle at 85% 80%, rgba(232, 93, 4, .12), transparent 28%),
                #431414;
        }

        /* Hilangkan kotak bawaan Breeze */
        body > div {
            background: transparent !important;
            box-shadow: none !important;
        }

        .login-wrapper {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            padding: 30px 15px 70px;
            position: relative;
            overflow: hidden;
        }

        .circle-one,
        .circle-two {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .circle-one {
            width: 180px;
            height: 180px;
            background: rgba(245, 183, 0, .10);
            top: -80px;
            left: -70px;
        }

        .circle-two {
            width: 220px;
            height: 220px;
            background: rgba(232, 93, 4, .08);
            bottom: -110px;
            right: -90px;
        }

        /* KOTAK LOGIN */
        .login-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 350px;
            background: #FFFAF5;
            padding: 18px 24px;
            box-sizing: border-box;
            border-radius: 14px;
            border: 1px solid #E6C7A8;
            box-shadow: 0 8px 24px rgba(91, 40, 20, .15);
        }

        .login-logo {
            text-align: center;
            margin-top: 8px;
            margin-bottom: 13px;
        }

        .login-logo img {
            width: 52px;
            height: 52px;
            object-fit: contain;
            display: block;
            margin: 0 auto 2px;
        }

        .login-title {
            margin: 0;
            color: #B9472E;
            font-size: 22px;
            font-weight: 800;
        }

        .login-title span {
            color: #B9472E;
        }

        .login-subtitle {
            margin: 3px 0 0;
            color: #806C63;
            font-size: 12px;
        }

        .form-group {
            margin-bottom: 11px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            color: #55332A;
            font-size: 13px;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            height: 38px;
            padding: 8px 11px;
            box-sizing: border-box;
            border: 1px solid #E6C7A8;
            border-radius: 8px;
            background: #FFFFFF;
            color: #3D2921;
            font-size: 13px;
            outline: none;
        }

        .form-input:focus {
            border-color: #B9472E;
            box-shadow: 0 0 0 2px rgba(232, 93, 4, .10);
        }

        .remember-row {
            display: flex;
            align-items: center;
            margin: 3px 0 12px;
        }

        .remember-row input {
            width: 15px;
            height: 15px;
            accent-color: #B9472E;
        }

        .remember-row label {
            margin-left: 6px;
            color: #806C63;
            font-size: 12px;
        }

        .action-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .forgot-link {
            color: #A54A2A;
            font-size: 12px;
            text-decoration: none;
        }

        .forgot-link:hover {
            color: #B9472E;
            text-decoration: underline;
        }

        .login-button {
            border: none;
            border-radius: 8px;
            padding: 9px 20px;
            background: #B9472E;
            color: white;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 3px 8px rgba(232, 93, 4, .22);
        }

        .login-button:hover {
            background: #963A26;
        }

        .welcome-text {
            text-align: center;
            margin-top: 13px;
            padding-top: 11px;
            border-top: 1px solid #E6C7A8;
            color: #806C63;
            font-size: 11px;
        }

        .welcome-text span {
            color: #8B2F23;
            font-weight: 700;
        }

        @media (max-height: 650px) {
            .login-card {
                padding: 14px 22px;
            }

            .login-logo img {
                width: 44px;
                height: 44px;
            }

            .login-logo {
                margin-top: 5px;
                margin-bottom: 8px;
            }

            .form-group {
                margin-bottom: 8px;
            }

            .welcome-text {
                margin-top: 8px;
                padding-top: 7px;
            }
        }
    </style>

    <div class="login-wrapper">

        <div class="circle-one"></div>
        <div class="circle-two"></div>

        <div class="login-card">

            <div class="login-logo">
                <img src="{{ asset('images/logo bks.png') }}" alt="Logo BaksoKu">

                <h1 class="login-title">
                    Bakso<span>Ku</span>
                </h1>

                <p class="login-subtitle">
                    Silakan masuk untuk melanjutkan
                </p>
            </div>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">
                        Email
                    </label>

                    <input
                        id="email"
                        class="form-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        Password
                    </label>

                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />
                </div>

                <div class="remember-row">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                    >

                    <label for="remember_me">
                        Remember me
                    </label>
                </div>

                <div class="action-row">

                    @if (Route::has('password.request'))
                        <a
                            class="forgot-link"
                            href="{{ route('password.request') }}"
                        >
                            Lupa password?
                        </a>
                    @endif

                    <button type="submit" class="login-button">
                        Log in
                    </button>

                </div>
            </form>

            <div class="welcome-text">
                Selamat datang di <span>BaksoKu</span>
            </div>

        </div>

    </div>

</x-guest-layout>
