@extends('layouts.app')

@section('title', 'Login - Autoescola')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 8px;">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div>
                    <img src="https://autoescolavip.com.br/wp-content/uploads/2022/01/WhatsApp_Image_2022-01-27_at_11.03.42-removebg-preview.png" alt="Logo" width="120">
                </div>
            </div>

            {{-- <h3 class="text-center mb-4" style="color: #DD0922;">Bem-vindo </h3> --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #2C2C74;">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #2C2C74;">Senha</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember" style="color: #2C2C74;">Lembrar-me</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn" style="background-color: #2C2C74; color: white;">Entrar</button>
                </div>

                @if (Route::has('password.request'))
                    <div class="mt-3 text-center">
                        <a href="{{ route('password.request') }}" style="color: #BC953F;">Esqueceu a senha?</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
