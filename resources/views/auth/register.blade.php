@extends('layouts.app')

@section('content')
<style>
.register-bg {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #fceabb 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}
body.dark-mode .register-bg {
    background: linear-gradient(135deg, #232526 0%, #414345 100%);
}
.register-card {
    border-radius: 1.5rem;
    box-shadow: 0 8px 32px rgba(44,62,80,0.10);
    background: var(--card-bg, #fff);
    padding: 2.5rem 2rem;
    max-width: 420px;
    width: 100%;
}
body.dark-mode .register-card {
    background: #23272b;
    color: #f8fafc;
}
.register-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-align: center;
    color: #764ba2;
}
body.dark-mode .register-title {
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
.register-btn {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: #fff;
    font-weight: 600;
    border-radius: 0.75rem;
    padding: 0.75rem;
    font-size: 1.1rem;
    transition: background 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 16px rgba(102,126,234,0.10);
}
.register-btn:hover {
    background: linear-gradient(45deg, #5a6fd8, #6a4190);
    box-shadow: 0 8px 32px rgba(102,126,234,0.15);
}
.register-links {
    text-align: center;
    margin-top: 1.5rem;
}
.register-links a {
    color: #764ba2;
    text-decoration: none;
    margin: 0 0.5rem;
    font-weight: 500;
}
body.dark-mode .register-links a {
    color: #f8fafc;
}
</style>
<div class="register-bg">
    <div class="register-card">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Pour acheter, veuillez créer un compte ou vous connecter.
                <a href="/register" class="btn btn-sm btn-success ms-2">Créer un compte</a>
                <a href="/login" class="btn btn-sm btn-primary ms-2">Se connecter</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="register-title">
            <i class="fas fa-user-plus me-2"></i>Créer un compte
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom complet</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                </div>
                @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirmer le mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <button type="submit" class="btn register-btn w-100 mt-3">
                <i class="fas fa-user-plus me-2"></i>S'inscrire
            </button>
        </form>
        <div class="register-links mt-4">
            <a href="/login"><i class="fas fa-sign-in-alt me-1"></i>Déjà inscrit ? Connexion</a> |
            <a href="/"><i class="fas fa-home me-1"></i>Accueil</a>
        </div>
    </div>
</div>
@endsection
