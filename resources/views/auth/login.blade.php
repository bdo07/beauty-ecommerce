@extends('layouts.app')

@section('content')
<style>
.login-bg {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #fceabb 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}
body.dark-mode .login-bg {
    background: linear-gradient(135deg, #232526 0%, #414345 100%);
}
.login-card {
    border-radius: 1.5rem;
    box-shadow: 0 8px 32px rgba(44,62,80,0.10);
    background: var(--card-bg, #fff);
    padding: 2.5rem 2rem;
    max-width: 420px;
    width: 100%;
}
body.dark-mode .login-card {
    background: #23272b;
    color: #f8fafc;
}
.login-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-align: center;
    color: #764ba2;
}
body.dark-mode .login-title {
    color: #f8fafc;
}
.form-control, .form-control:focus {
    border-radius: 0.75rem;
    box-shadow: none;
    border-color: #e0e0e0;
}
body.dark-mode .form-control, body.dark-mode .form-control:focus {
    background: #23272b;
    color: #f8fafc;
    border-color: #414345;
}
.input-group-text {
    background: #f8fafc;
    border-radius: 0.75rem 0 0 0.75rem;
    border-color: #e0e0e0;
}
body.dark-mode .input-group-text {
    background: #23272b;
    color: #f8fafc;
    border-color: #414345;
}
.login-btn {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: #fff;
    font-weight: 600;
    border-radius: 0.75rem;
    padding: 0.75rem;
    font-size: 1.1rem;
    transition: background 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 16px rgba(102,126,234,0.10);
}
.login-btn:hover {
    background: linear-gradient(45deg, #5a6fd8, #6a4190);
    box-shadow: 0 8px 32px rgba(102,126,234,0.15);
}
.login-links {
    text-align: center;
    margin-top: 1.5rem;
}
.login-links a {
    color: #764ba2;
    text-decoration: none;
    margin: 0 0.5rem;
    font-weight: 500;
}
body.dark-mode .login-links a {
    color: #f8fafc;
}
</style>
<div class="login-bg">
    <div class="login-card">
        <div class="login-title">
            <i class="fas fa-sign-in-alt me-2"></i>Connexion
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
                </div>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Se souvenir de moi
                </label>
            </div>
            <button type="submit" class="btn login-btn w-100 mt-3">
                <i class="fas fa-sign-in-alt me-2"></i>Se connecter
            </button>
        </form>
        <div class="login-links mt-4">
            <a href="/register"><i class="fas fa-user-plus me-1"></i>Créer un compte</a> |
            <a href="/"><i class="fas fa-home me-1"></i>Accueil</a>
        </div>
    </div>
</div>
@endsection
