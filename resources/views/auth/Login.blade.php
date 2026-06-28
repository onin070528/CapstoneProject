@extends('layouts.app')
@section('title', 'Sign In - iTOUR Davao Oriental')
@section('content')
<div class="login-page">
    {{-- ======================== LEFT PANEL ======================== --}}
    <div class="login-left">
        {{-- Background image + gradient overlay --}}
        <div class="login-left__bg">
            <div class="login-left__overlay"></div>
            <div class="login-left__overlay-dark"></div>
        </div>

        {{-- Content --}}
        <div class="login-left__content">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="login-logo">
                <div class="login-logo__icon">iT</div>
                <div class="login-logo__text">
                    <span class="login-logo__name">iTOUR</span>
                    <span class="login-logo__sub">DAVAO ORIENTAL</span>
                </div>
            </a>

            {{-- Hero copy --}}
            <div class="login-left__hero">
                <div class="login-left__pill">
                    <span class="login-left__pill-dot"></span>
                    PROVINCIAL TOURISM OFFICE
                </div>

                <h1 class="login-left__heading">
                    Discover, explore, and protect the wonders of Davao Oriental.
                </h1>

                <p class="login-left__desc">
                    One platform for tourists, accredited establishments, and tourism personnel — built for sustainable travel.
                </p>

                {{-- Feature list --}}
                <ul class="login-left__features">
                    <li>
                        <span class="login-left__feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor" width="14" height="14"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        </span>
                        150+ destinations across the province
                    </li>
                    <li>
                        <span class="login-left__feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor" width="14" height="14"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        </span>
                        Government-accredited establishments
                    </li>
                    <li>
                        <span class="login-left__feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor" width="14" height="14"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        </span>
                        Real-time visitor monitoring & analytics
                    </li>
                </ul>
            </div>

            {{-- Footer --}}
            <div class="login-left__footer">
                &copy; {{ date('Y') }} Provincial Government of Davao Oriental
            </div>
        </div>
    </div>

    {{-- ======================== RIGHT PANEL ======================== --}}
    <div class="login-right">
        <div class="login-card">
            {{-- Badge --}}
            <div class="login-card__badge">SECURE ACCESS</div>

            <h2 class="login-card__title">Welcome back</h2>
            <p class="login-card__subtitle">Sign in to continue exploring Davao Oriental.</p>

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login.submit') }}" class="login-card__form" id="loginForm">
                @csrf

                {{-- Email --}}
                <div class="login-card__field">
                    <label for="email" class="login-card__label">Email address</label>
                    <div class="login-card__input-wrap">
                        <span class="login-card__input-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor" width="18" height="18"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                        </span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            class="login-card__input @error('email') login-card__input--error @enderror"
                        >
                    </div>
                    @error('email')
                        <p class="login-card__error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="login-card__field">
                    <div class="login-card__label-row">
                        <label for="password" class="login-card__label">Password</label>
                        <a href="#" class="login-card__forgot">Forgot password?</a>
                    </div>
                    <div class="login-card__input-wrap">
                        <span class="login-card__input-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor" width="18" height="18"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                            class="login-card__input @error('password') login-card__input--error @enderror"
                        >
                        <button type="button" class="login-card__toggle-pw" id="togglePassword" aria-label="Toggle password visibility">
                            <svg id="eyeIcon" viewBox="0 0 20 20" fill="currentColor" width="18" height="18"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="login-card__error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember me --}}
                <div class="login-card__remember">
                    <label class="login-card__checkbox-label">
                        <input type="checkbox" name="remember" id="remember" class="login-card__checkbox">
                        <span class="login-card__checkbox-custom"></span>
                        Keep me signed in on this device
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="login-card__submit" id="loginSubmit">
                    Sign in
                    <svg viewBox="0 0 20 20" fill="currentColor" width="16" height="16"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </button>
            </form>

            {{-- Divider --}}
            <div class="login-card__divider">
                <span>OR CONTINUE WITH</span>
            </div>

            {{-- Social Buttons --}}
            <div class="login-card__socials">
                <button type="button" class="login-card__social" id="googleLogin">
                    <span class="login-card__social-icon login-card__social-icon--google">G</span>
                    Google
                </button>
                <button type="button" class="login-card__social" id="microsoftLogin">
                    <span class="login-card__social-icon login-card__social-icon--microsoft">M</span>
                    Microsoft
                </button>
            </div>

            {{-- Sign up link --}}
            <p class="login-card__signup">
                New to iTOUR? <a href="#">Create an account</a>
            </p>
        </div>

        {{-- Terms footer --}}
        <p class="login-right__terms">
            By continuing, you agree to our <a href="#">Terms</a> & <a href="#">Privacy Policy</a>.
        </p>
    </div>
</div>

{{-- ======================== INLINE JS ======================== --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- Password toggle ---
    const toggleBtn = document.getElementById('togglePassword');
    const pwField = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (toggleBtn && pwField) {
        toggleBtn.addEventListener('click', function () {
            const isPassword = pwField.type === 'password';
            pwField.type = isPassword ? 'text' : 'password';
            // Swap icon
            if (isPassword) {
                eyeIcon.innerHTML = '<path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"/><path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"/>';
            } else {
                eyeIcon.innerHTML = '<path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>';
            }
        });
    }
});
</script>
@endsection
